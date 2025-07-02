<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drawing extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'bill_no' => ['name' => '交易流水号','type' => 'text','is_show' => true],
        'member_id' => ['name' => '会员ID', 'type' => 'number', 'is_show' => true],
        
        'name' => ['name' => '收款人姓名','type' => 'text'],
        'money' => ['name' => '提款金额','type' => 'number','is_show' => true],
        'account' => ['name' => '账户信息','type' => 'text'],
        'before_money' => ['name' => '提款前金额','type' => 'number','is_show' => false],
        'after_money' => ['name' => '提款后金额','type' => 'number','is_show' => false],
        'score' => ['name' => '积分','type' => 'number','is_show' => false],
        'counter_fee' => ['name' => '手续费','type' => 'number','validate' => 'required','is_show' => true],
        'fail_reason' => ['name' => '失败原因','type' => 'text'],
        'member_bank_info' => ['name' => '用户银行数据json','type' => 'text'],
        'member_remark' => ['name' => '用户提款备注','type' => 'text'],
        
        'confirm_at' => ['name' => '确认转账时间','type' => 'datetime'],
        'status' => ['name' => '提款状态','type' => 'select','is_show' => true,'data' => 'platform.drawing_status'],
        'user_id' => ['name' => '管理员ID', 'type' => 'number', 'is_show' => true],
    ];

    const STATUS_UNDEAL = 1; // 待确认
    const STATUS_SUCCESS = 2; // 审核通过
    const STATUS_FAILED = 3; // 审核失败

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member','member_id','id');
    }

    public function scopeMemberName($query,$name){
        return $name ? $query->whereHas('member',function($q) use($name){
            $q->where('name','like','%'.$name.'%');
        }) : $query;
    }

    public function scopeUserName($query,$name){
        return $name ? $query->whereHas('user',function($q) use($name){
            $q->where('name','like','%'.$name.'%');
        }) : $query;
    }

    public function scopeMemberLang($query,$lang){
        return $lang ? $query->whereHas('member',function($q) use($lang){
            $q->where('lang',$lang);
        }) : $query;
    }

    protected $appends = ['status_text'];

    public function getStatusTextAttribute(){
        return isset_and_not_empty(config('platform.drawing_status'),$this->attributes['status'],$this->attributes['status']);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
