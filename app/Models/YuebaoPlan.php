<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YuebaoPlan extends Base
{
    protected $guarded = ['id'];

    public static $list_field = [
        'SettingName' => ['name' => '方案标题','type' => 'text','validate' => 'required','is_show' => true],
        'MinAmount' => ['name' => '最小购买金额','type' => 'number','validate' => 'required','is_show' => false],
        'MaxAmount' => ['name' => '最大购买金额','type' => 'number','validate' => 'required','is_show' => false],
        'SettleTime' => ['name' => '结算时间（小时）','type' => 'number','validate' => 'required','is_show' => false],
        'IsCycleSettle' => ['name' => '结算方式','type' => 'radio','validate' => 'required','data' => 'platform.yuebao_settle_type','is_show' => true],
        'Rate' => ['name' => '方案利率','type' => 'number','validate' => 'required','is_show' => true],
        //'RemainingCount' => ['name' => '可购买总金额','type' => 'number','validate' => 'required','is_show' => true],
        'TotalCount' => ['name' => '计划总金额','type' => 'number','validate' => 'required','is_show' => true],
        'LimitInterest' => ['name' => '会员封顶利息','type' => 'number','validate' => 'required','is_show' => true],
        'LimitOrderIntervalTime' => ['name' => '订单间隔时间（小时）','type' => 'number','is_show' => false],
        'InterestAuditMultiple' => ['name' => '利息码量倍数','type' => 'number','is_show' => false],
        'LimitUserOrderCount' => ['name' => '会员最大购买总金额','type' => 'number','is_show' => false],
        'lang' => ['name' => '币种','type' => 'select','is_show' => true,'data' => 'platform.lang_fields'],
        'is_open' => ['name' => '是否开放购买','type' => 'radio','data' => 'platform.is_open','is_show' => true,'style' => 'platform.style_isopen'],
        'weight' => ['name' => '排序','type' => 'number','is_show' => false]
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function member_plans(){
        return $this->hasMany('App\Models\MemberYuebaoPlan','plan_id','id');
    }

    public function last_member_plans($member_id){
        return $this->hasOne('App\Models\MemberYuebaoPlan','plan_id','id')
            ->where('member_id',$member_id)
            ->orderByDesc('created_at');
    }
}
