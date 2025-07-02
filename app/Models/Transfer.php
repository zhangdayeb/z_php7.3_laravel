<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'bill_no' => ['name' => '交易流水号','type' => 'text','is_show' => true],
        'api_name' => ['name' => '接口标识','type' => 'text','is_show' => true],
        'member_id' => ['name' => '会员ID','type' => 'text','is_show' => true],
        'transfer_type' => ['name' => '转账类型','is_show' => true,'type' => 'select','data' => 'platform.transfer_type','style' => 'platform.style_transfer_type'],
        'money' => ['name' => '转换金额','type' => 'text','is_show' => true],
        'diff_money' => ['name' => '差价（红利）金额','type' => 'text','is_show' => true,'min-width' => '140px'],
        'real_money' => ['name' => '实际转换金额','type' => 'text','is_show' => true],
        'before_money' => ['name' => '转账前的金额','type' => 'text','is_show' => false],
        'after_money' => ['name' => '转账后的金额','type' => 'text','is_show' => false],
        'money_type' => ['name' => '金额字段类型', 'type' => 'select', 'is_show' => true, 'data' => 'platform.member_money_type','style' => 'platform.member_money_type_style'],
    ];

    const TRANSFER_TYPE_IN = 1;
    const TRANSFER_TYPE_OUT = 2;

    public function member()
    {
        return $this->belongsTo('App\Models\Member','member_id','id');
    }

    public function scopeMemberLang($query,$lang){
        return $lang ? $query->whereHas('member',function($q) use($lang){
            $q->where('lang',$lang);
        }) : $query;
    }

    public function scopeMemberName($query,$name){
        return $name ? $query->whereHas('member',function($q) use($name){
            $q->where('name','like','%'.$name.'%');
        }) : $query;
    }
}
