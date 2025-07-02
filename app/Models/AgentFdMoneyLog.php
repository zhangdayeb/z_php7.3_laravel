<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentFdMoneyLog extends Model
{
    public $guarded = ['id'];

    public static $list_field = [
        'member_id' => ['name' => '玩家会员ID','type' => 'number', 'is_show' => true],
        'member_rate' => ['name' => '玩家返点比例(%)','type' => 'number','validate' => 'required','is_show' => false],
        'agent_member_id' => ['name' => '代理ID','type' => 'number', 'is_show' => false],
        'agent_member_rate' => ['name' => '代理返点比例(%)','type' => 'number','validate' => 'required','is_show' => true,'min-width' => '140px'],
        'child_member_id' => ['name' => '下级会员ID','type' => 'number', 'is_show' => false],
        'child_member_rate' => ['name' => '下级会员返点比例(%)','type' => 'number','validate' => 'required','is_show' => true,'min-width' => '160px'],
        'game_type' => ['name' => '游戏类型','type' => 'select','validate' => 'required','is_show' => true,'data' => 'platform.game_type'],
        'bet_amount' => ['name' => '下注金额','type' => 'number','validate' => 'required','is_show' => true],
        'fd_money' => ['name' => '返点金额','type' => 'number','validate' => 'required','is_show' => true],
        'money_before' => ['name' => '日志前余额','type' => 'number','validate' => 'required','is_show' => true],
        'money_after' => ['name' => '日志后余额','type' => 'number','validate' => 'required','is_show' => true],
        'remark' => ['name' => '备注','type' => 'text','is_show' => true]
    ];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function agent_member(){
        return $this->belongsTo('App\Models\Member','agent_member_id','id');
    }
}
