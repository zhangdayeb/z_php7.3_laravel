<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FsLevel extends Model
{
    public $guarded = ['id'];

    public static $list_field = [
        'game_type' => ['name' => '游戏类型','type' => 'select','validate' => 'required','is_show' => true,'data' => 'platform.game_type'],
        'member_id' => ['name' => '会员ID','type' => 'number','is_show' => false],
        'level' => ['name' => '反水等级','type' => 'number','validate' => 'required','is_show' => true],
        'name' => ['name' => '等级名称','type' => 'string','validate' => 'required','is_show' => true],
        'quota' => ['name' => '有效投注额度','type' => 'number','validate' => 'required','is_show' => true],
        'type' => ['name' => '类型','type' => 'select','data' => 'platform.fs_type','is_show' => true],
        'rate' => ['name' => '反水比例','type' => 'number','validate' => 'required','is_show' => true],
        'lang' => ['name' => '语言/币种','type' => 'select','is_show' => true,'data' => 'platform.lang_select'],
    ];

    const TYPE_SYSTEM = 1;
    const TYPE_MEMBER = 2;

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    // 根据有效投注和游戏类型获取最大的返点
    // FsLevel::memberMaxRate(1,100,1)
    public function scopeMemberMaxRate($query,$member_id,$quota,$gametype){
        return $query->whereIn('member_id',[$member_id,0])->where('quota','<',$quota)->where('game_type',$gametype)->orderBy('rate','desc');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
