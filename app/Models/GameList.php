<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GameList extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'api_name' => ['name' => '接口标识','type' => 'text','validate' => 'required','is_show' => true],
        'name' => ['name' => '游戏中文名称','type' => 'text','validate' => 'required','is_show' => true],
        'en_name' => ['name' => '英文名称','type' => 'text','validate' => 'required','is_show' => false],

        'game_type' => ['name' => '游戏类型','is_show' => false,'type' => 'select','data' => 'platform.game_type'],
        'game_code' => ['name' => '游戏ID','is_show' => false,'validate' => 'required','type' => 'text'],
        'tcg_game_type' => ['name' => 'TCG游戏类型','is_show' => false,'type' => 'select','data' => 'platform.tcg_game_type','style' => 'platform.tcg_game_type_style'],
        'param_remark' => ['name' => '参数补充','type' => 'text'],

        'img_path' => ['name' => '图片路径','type' => 'picture'],
        'img_url' => ['name' => '图片地址','type' => 'picture','is_show' => false],

        'client_type' => ['name' => '运行平台','type' => 'radio','is_show' => true,'data' => 'platform.client_type'],
        'platform' => ['name' => '支持环境','type' => 'text','is_show' => true],

        'is_open' => ['name' => '是否开放', 'type' => 'radio', 'validate' => 'required', 'data' => 'platform.is_open', 'is_show' => true, 'style' => 'platform.style_boolean'],
        'weight' => ['name' => '权重', 'type' => 'number'],
        'tags' => ['name' => '标签', 'type' => 'text', 'is_show' => false]
    ];

    public function getTagsArrayAttribute(){
        return \Str::contains($this->tags,',') ? explode(',',$this->tags) : [$this->tags];
    }

    public function api()
    {
        return $this->belongsTo('App\Models\Api','api_name','api_name');
    }

    public function scopeWhereTags($query, $array){
        if(!count($array)) return $query; 

        foreach($array as $item){
            $query = $query->where('tags','like','%'.$item.'%');
        }
        return $query;
        // return $query->where()
    }

    public $appends = ['full_image_url'];

    public function getFullImageUrlAttribute(){
        return $this->img_path ? systemconfig('site_domain').'/web/images/game/'.strtolower($this->api_name).'/'.$this->img_path : $this->img_url;
    }

    public function getImageUrlAttribute(){
        return getUrlByDomain($this->img_url);
    }

    // 0不限，1电脑，2手机
    public function scopeWhichClientType($query,$type){
        switch ($type){
            case 0:
                return $query;
                break;
            case 1:
                return $query->whereIn('client_type',[0,1])->orWhere('platform','like','%flash%');
                break;
            case 2:
                return $query->whereIn('client_type',[0,2])->orWhere('platform','like','%html5%');
                break;
        }
    }

    // 查询SQL：
    // select count(*) from new_game_lists where api_code = 'AG' and img_path like '%.png%'
    // 调用方式 app(\App\Models\GameList::modifyJPG('AG'))
    public static function convertPngToJpg($api_code){
        foreach (GameList::where('api_name',$api_code)->where('img_path','like','%.png%')->get() as $item){
            $item->update([
                'img_path' => explode('.',$item->img_path)[0].'.jpg'
            ]);
        }
    }
}
