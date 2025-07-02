<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class GameRecord extends Model
{
    public $guarded = ['id'];

    public static $list_field = [
        'billNo' => ['name' => '注单流水号','type' => 'text','is_show' => true],
        'api_name' => ['name' => '接口标识','type' => 'text','is_show' => true],
        'name' => ['name' => '玩家账号','type' => 'text','is_show' => true],
        'gameType' => ['name' => '游戏类型','is_show' => true,'type' => 'select','data' => 'platform.game_type'],
        'status' => ['name' => '结算状态','is_show' => true, 'type' => 'select','data' => 'platform.gamerecord_status'],
        'betTime' => ['name' => '下注时间','type' => 'text','is_show' => true],
        'betAmount' => ['name' => '下注金额','type' => 'text','is_show' => true],
        'validBetAmount' => ['name' => '有效下注金额','type' => 'text','is_show' => true],
        'netAmount' => ['name' => '派彩金额','type' => 'text','is_show' => false],
        'roundNo' => ['name' => '场次信息','type' => 'text','is_show' => false],
        'playDetail' => ['name' => '玩法详情','type' => 'text','is_show' => false],
        'wagerDetail' => ['name' => '下注明细','type' => 'text','is_show' => false],
        'gameResult' => ['name' => '开奖结果','type' => 'text','is_show' => false],
    ];

    protected $appends = ['game_type_text'];

    public function getGameTypeTextAttribute(){
        return isset_and_not_empty(config('platform.game_type'),$this->attributes['gameType'],$this->attributes['gameType']);
    }

    public function getApiNameTextAttribute(){
        $m = Api::where('api_name',$this->api_name)->first();
        return $m ? $m->api_title : $this->api_name;
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    const STATUS_COMPLETE = 'COMPLETE'; // 已结算
    const STATUS_N = 'N'; //已取消
    const STATUS_X = 'X'; // 未结算
    const STATUS_CANCEL = 'CANCEL'; // 已撤销

    // 判断是否可以发放返点
    public function canSendFd(){
        // return $this->flag == 1 && $this->is_fd != 1;
        return $this->status == self::STATUS_COMPLETE && $this->is_fd == 0;
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function scopeMemberLang($query,$lang){
        return $lang ? $query->whereHas('member',function($q) use($lang){
            $q->where('lang',$lang);
        }) : $query;
    }

    public function generateData($member,$api_name){
        $data = [
            'billno' => getBillNo(),
            'member_id' => $member->id,
            'name' => $member->name,
            'playerName' => $member->name,
            // 'api_name' => Arr::random(['AG','MG','BBIN']),
            'api_name' => $api_name,
            'betTime' => Carbon::now()->subMinutes(random_int(1,99)),
            'flag' => Arr::random([0,1]),
            'betAmount' => floatval(sprintf("%.2f",random_int(10,499))),
            'gameType' => Arr::random(array_keys(config('platform.game_type'))),
            'payoffTime' => Carbon::now()->addMinutes(random_int(1,99)),
        ];

        if($data['flag'] == 1){
            $data['validBetAmount'] = $data['betAmount'];
            $data['netAmount'] = Arr::random([0,$data['betAmount']]);
            $data['netAmount'] = floatval(sprintf("%.2f",$data['netAmount']));
        }else{
            $data['validBetAmount'] = 0;
            $data['netAmount'] = 0;
        }
        return $data;
    }

    // 获取用户的累计流水
    // app(\App\Models\GameRecord::class)->getMemberTotalValidBet(1)
    public function getMemberTotalValidBet($member_id,$game_type = ''){
        return $this->where('member_id',$member_id)
            ->when($game_type,function ($query) use($game_type) {
                return $query->where('gameType',$game_type);
            })
            ->where('status','<>','X')
            ->sum('validBetAmount');
    }

    public function getGameTypeByConditionType($condition_type){
        if($condition_type == Task::TYPE_SUM_TRANSACTION_SLOT) return 3;
        if($condition_type == Task::TYPE_SUM_TRANSACTION_LIVE) return 1;
        return '';
    }
}
