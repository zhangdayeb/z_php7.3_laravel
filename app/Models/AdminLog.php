<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminLog extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    const LOG_TYPE_LOGIN = 1; // 后台登录
    const LOG_TYPE_LOGOUT = 2;// 后台登出
    const LOG_TYPE_ACTION = 3; // 后台操作
    const LOG_TYPE_SYSTEM = 4; // 系统异常

    public static $logTypeMap = [
        self::LOG_TYPE_LOGIN => '后台登录',
        self::LOG_TYPE_LOGOUT => '后台登出',
        self::LOG_TYPE_ACTION => '后台操作',
        self::LOG_TYPE_SYSTEM => '系统异常'
    ];

    // 详情页面的数据解释
    public static $list_field = [
        'id' => 'ID',
        'user_id' => '管理员ID',
        'user_name' => '管理员用户名',
        'url' => '操作地址',
        'data' => '操作数据',
        'ip' => '操作IP',
        'address' => 'IP真实地址',
        'ua' => '操作环境',
        'type' => '操作类型',
        'type_text' => '操作类型说明',
        'description' => '操作描述',
        'remark' => '操作备注',
        'created_at' => '创建时间',
        'updated_at' => '更新时间'
    ];

    protected $appends = ['type_text','user_name'];
    
    public function getTypeTextAttribute(){
        return isset_and_not_empty(self::$logTypeMap,$this->attributes['type'],$this->attributes['type']);
    }

    public function getUserNameAttribute(){
        return $this->user->name;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
