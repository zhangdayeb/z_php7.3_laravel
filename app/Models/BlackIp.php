<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlackIp extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'ip' => ['name' => 'IP地址','is_show' => true,'type' => 'text'],
        'is_open' => ['name' => '是否开启','is_show' => true,'type' => 'radio','data' => 'platform.is_open'],
        'remark' => ['name' => '备注信息','is_show' => true,'type' => 'text']
    ];

    // \App\Models\BlackIp::getIpArray()
    public function scopeGetIpArray($query){
        return $query->where('is_open',1)->pluck('ip')->toArray();
    }
}
