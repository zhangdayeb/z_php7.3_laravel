<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentYjLog extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'agent_id' => ['name' => '代理id', 'type' => 'number', 'is_show' => true],
        'yl_money' => ['name' => '盈利金额', 'type' => 'number', 'validate' => 'required', 'is_show' => true],
        'money' => ['name' => '佣金', 'type' => 'number', 'validate' => 'required', 'is_show' => true],
        'last_month' => ['name' => '最后发放佣金月份','type' => 'text','is_show' => true],
        'remark' => ['name' => '操作备注', 'type' => 'text', 'is_show' => true],
    ];

    public function member(){
        return $this->belongsTo('App\Models\Member','agent_id','agent_id');
    }
}
