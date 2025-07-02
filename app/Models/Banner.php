<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Base
{
    protected $guarded = [];

    public static $list_field = [
        'id' => ['name' => 'ID','is_show' => false],
        'title' => ['name' => '标题','type' => 'text','is_show' => true],
        'description' => ['name' => '描述','type' => 'text','is_show' => false],
        'url' => ['name' => '地址','type' => 'picture','is_show' => true],
        'dimensions' => ['name' => '宽高','type' => 'text','is_show' => true],
        'groups' => ['name' => '分组','type' => 'text','is_show' => true],
        'jump_link' => ['name' => '跳转链接','type' => 'text'],
        'is_new_window' => ['name' => '是否新窗口打开','type' => 'radio'],
        'weight' => ['name' => '权重','type' => 'text','is_show' => true],
        'lang' => ['name' => '语言','type' => 'select','is_show' => true,'data' => 'platform.lang_fields'],
        'is_open' => ['name' => '是否开启','type' => 'radio','is_show' => true,'data' => 'platform.is_open','style' => 'platform.style_isopen'],
        'created_at' => ['name' => '创建时间','type' => 'text','is_show' => true],
        'updated_at' => ['name' => '更新时间','is_show' => false]
    ];
}
