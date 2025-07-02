<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberApi extends Model
{
    protected $guarded = ["id"];

    public static $list_field = [
        'api_name' => ['name' => '接口标识','is_show' => true],
        'member_id' => ['name' => '会员ID','is_show' => true],
        'username' => ['name' => '平台账号','is_show' => true],
        'password' => ['name' => '平台密码','is_show' => true],
        'money' => ['name' => '平台余额','is_show' => true],
        'last_login_at' => ['name' => '上次登录时间','is_show' => true],
        'description' => ['name' => '描述','is_show' => true]
    ];  

    protected function scopeApi($query, $api_code){
        return $query->where('api_name',$api_code)->first();
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member','member_id','id');
    }

    public function api(){
        return $this->hasOne('App\Models\Api','api_name','api_name');
    }

    public function scopeMemberName($query,$name){
        return $name ? $query->whereHas('member',function($q) use($name){
            $q->where('name','like','%'.$name.'%');
        }) : $query;
    }
}
