<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameHot extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'name' => ['name' => '厅名称','type' => 'text','validate' => 'required','is_show' => true],
        'api_name' => ['name' => '接口名称','type' => 'text','validate' => 'required','is_show' => true],
        'game_type' => ['name' => '游戏类型','validate' => 'required','is_show' => true, 'type' => 'select','data' => 'platform.game_type'],
        'type' => ['name' => '位置类型','validate' => 'required','is_show' => true, 'type' => 'select','data' => 'platform.hot_game_place_type'],
        'lang' => ['name' => '语种','validate' => 'required','is_show' => true,'type' => 'select', 'data' => 'platform.language_type'],
        'desc' => ['name' => '厅描述','type' => 'text'],
//        'en_name' => ['name' => '厅名称','type' => 'text'],
//        'en_desc' => ['name' => '参数补充','type' => 'text'],
//        'tw_name' => ['name' => '厅名称','type' => 'text'],
//        'tw_desc' => ['name' => '参数补充','type' => 'text'],
//        'th_name' => ['name' => '厅名称','type' => 'text'],
//        'th_desc' => ['name' => '参数补充','type' => 'text'],
//        'vi_name' => ['name' => '厅名称','type' => 'text'],
//        'vi_desc' => ['name' => '参数补充','type' => 'text'],
        'jump_link' => ['name' => '跳转链接','type' => 'text'],
        'is_new_window' => ['name' => '是否新窗口打开','type' => 'radio'],
        'game_code' => ['name' => '入口代码','type' => 'text'],
        'icon_path' => ['name' => '选中前 icon','type' => 'picture'],
        'icon_path2' => ['name' => '选中后 icon','type' => 'picture'],
        'img_url' => ['name' => '图片地址','type' => 'picture'],

        'is_online' => ['name' => '是否开放', 'type' => 'radio', 'validate' => 'required', 'data' => 'platform.is_online', 'is_show' => true, 'style' => 'platform.style_boolean'],
        'sort' => ['name' => '排序', 'type' => 'number'],
    ];

//    public $appends = ['full_image_url','full_icon_url'];
//
//    public function getFullImageUrlAttribute(){
//        return $this->img_path ? systemconfig('site_domain').'/web/images/game/'.strtolower($this->api_name).'/'.$this->img_path : $this->img_url;
//    }
//
//    public function getFullIconUrlAttribute(){
//        return $this->img_path ? systemconfig('site_domain').'/web/images/game/'.strtolower($this->api_name).'/'.$this->img_path : $this->img_url;
//    }
//
//    public function getImageUrlAttribute(){
//        return getUrlByDomain($this->img_url);
//    }
//
//    public function getIconPathAttribute(){
//        return getUrlByDomain($this->icon_path);
//    }
}
