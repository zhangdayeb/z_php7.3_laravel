<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberBank extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'member_id' => ['name' => '会员ID', 'type' => 'number', 'is_show' => true],
        'card_no' => ['name' => '卡号', 'type' => 'text', 'validate' => 'required', 'is_show' => true],
        'bank_type' => ['name' => '银行类型', 'type' => 'text', 'is_show' => false],
        'bank_type_text' => ['name' => '银行类型', 'type' => 'text', 'is_show' => true],
        'phone' => ['name' => '办卡预留手机号', 'type' => 'text', 'is_show' => false],
        'owner_name' => ['name' => '持卡人姓名', 'type' => 'text','validate' => 'required', 'is_show' => true],
        'bank_address' => ['name' => '开户行地址', 'type' => 'text', 'is_show' => true],
        'remark' => ['name' => '操作备注', 'type' => 'text', 'is_show' => false],
    ];

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function scopeMemberName($query,$name){
        return $name ? $query->whereHas('member',function($q) use($name){
            $q->where('name','like','%'.$name.'%');
        }) : $query;
    }

    public $appends = ['bank_type_text'];

    public function getBankTypeTextAttribute(){
        // return isset_and_not_empty(config('platform.bank_type'), $this->attributes['bank_type'], $this->attributes['bank_type']);
        return isset_and_not_empty(Bank::getAllBankArray(), $this->attributes['bank_type'], $this->attributes['bank_type']);
    }
}
