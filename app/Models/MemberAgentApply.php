<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberAgentApply extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'member_id' => ['name' => '会员ID','type' => 'text','is_show' => true,'validate' => 'required'],
        'name' => ['name' => '真实姓名','type' => 'text','is_show' => true],
        'phone' => ['name' => '电话号码','type' => 'text','is_show' => true],
        'email' => ['name' => '电子邮件','type' => 'text','is_show' => true],
        'msn_qq' => ['name' => '联系方式MSN/QQ','type' => 'text','is_show' => true,'min-width' => '140px'],
        'reason' => ['name' => '申请原因','type' => 'text','is_show' => true],
        'status' => ['name' => '申请状态','type' => 'select','is_show' => true,'data' => 'platform.apply_status'],
        'fail_reason' => ['name' => '失败原因','type' => 'text','is_show' => false]
    ];

    const STATUS_NOT_DEAL = 0;
    const STATUS_ENSURE = 1;
    const STATUS_REJECT = 2;

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
}
