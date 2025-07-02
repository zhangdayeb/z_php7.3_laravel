<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsideAdv extends Base
{
    protected $guarded = ['id'];

    public static $list_field = [
        'name' => ['name' => '名称','type' => 'text','validate' => 'required','is_show' => true],
        'group' => ['name' => '分组名','type' => 'text','is_show' => true],
        'pic_url' => ['name' => '广告图片','type' => 'picture','is_show' => true],
        'pic_index' => ['name' => '图片索引','type' => 'number','is_show' => false],

        'vertical' => ['name' => '垂直位置','type' => 'radio','is_show' => true,'data' => 'platform.adv_vertical'],
        'horizontal' => ['name' => '水平位置','type' => 'radio','is_show' => true,'data' => 'platform.adv_horizontal'],

        'effect' => ['name' => '特效','type' => 'select','is_show' => false,'data' => 'platform.adv_effect'],
        'url_id' => ['name' => '跳转路由','type' => 'select','is_show' => false,'data' => 'platform.adv_horizontal'],

        'remark' => ['name' => '备注信息','type' => 'text','is_show' => false],
        'lang' => ['name' => '语言','type' => 'select','is_show' => true,'data' => 'platform.lang_fields'],
        'is_open' => ['name' => '是否开放','type' => 'radio','data' => 'platform.is_open','is_show' => true],
        'weight' => ['name' => '排序','type' => 'number','is_show' => false]
    ];

    public function quickurl(){
        return $this->hasOne('App\Models\QuickUrl','id','url_id');
    }

    public function advs(){
        return $this->hasMany('App\Models\AsideAdv','group','group');
    }
}
