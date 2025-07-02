<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class CreditPayRecord extends Model
{
    public $guarded = ['id'];

    public static $list_field = [
        'member_id' => ['name' => '会员id', 'type' => 'number', 'is_show' => true],
        'money' => ['name' => '借款金额', 'type' => 'number', 'validate' => 'required', 'is_show' => true],
        'type' => ['name' => '类型','type' => 'select','data' => 'platform.credit_type','is_show' => true],
        'borrow_day' => ['name' => '借款天数','type' => 'number','is_show' => true],
        'status' => ['name' => '状态','type' => 'select','data' => 'platform.credit_status','is_show' => true],
        'dead_at' => ['name' => '借款到期时间','type' => 'datetime','is_show' => false],
    ];

    const CREDIT_PAY_DAYS = 30; // 默认借款天数

    const TYPE_BORROW = 'borrow'; // 借款
    const TYPE_LEND = 'lend'; // 还款

    const STATUS_UNDEAL = 1; // 待确认
    const STATUS_SUCCESS = 2; // 通过
    const STATUS_FAILED = 3; // 拒绝
    const STATUS_RETURN = 4; // 已还款

    public function scopeMemberName($query,$name){
        return $name ? $query->whereHas('member',function($q) use($name){
            $q->where('name','like','%'.$name.'%');
        }) : $query;
    }

    public function getStatusTextAttribute(){
        return Arr::get(config('platform.credit_status'),$this->status);
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function getMemberTotalBorrow($member_id){
        return $this->where('member_id',$member_id)
            ->where('status',self::STATUS_SUCCESS)->sum('money');
    }

    public function getMemberTotalLend($member_id){
        return $this->where('member_id',$member_id)
            ->where('status',self::STATUS_RETURN)->sum('money');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
