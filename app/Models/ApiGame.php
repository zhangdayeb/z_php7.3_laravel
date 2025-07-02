<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class ApiGame extends Base
{
    public $guarded = ['id'];

    public $hidden = ['lang_json'];

    public static $list_field = [
        'title' => ['name' => '游戏标题', 'type' => 'text', 'validate' => 'required', 'is_show' => true],
        'subtitle' => ['name' => '副标题', 'type' => 'text'],
        'web_pic' => ['name' => '电脑端图片', 'type' => 'picture', 'is_show' => true],		
        'mobile_pic' => ['name' => '手机端图片', 'type' => 'picture', 'is_show' => true],
        'logo_url' => ['name' => 'logo','type' => 'picture'],
        // 'api_id' => ['name' => '接口ID', 'type' => 'text','is_show' => true],
        'api_name' => ['name' => '接口标识', 'type' => 'text','is_show' => true],
        'class_name' => ['name' => '样式标识','type' => 'text','is_show' => false],
        'game_type' => ['name' => '游戏类型', 'type' => 'select', 'is_show' => true, 'data' => 'platform.game_type'],
        'params' => ['name' => '参数', 'type' => 'text'],
        'client_type' => ['name' => '运行平台','type' => 'radio','is_show' => true,'data' => 'platform.client_type'],
        'is_open' => ['name' => '是否开放', 'type' => 'radio', 'validate' => 'required', 'data' => 'platform.is_open', 'is_show' => true, 'style' => 'platform.style_boolean'],
        'weight' => ['name' => '权重', 'type' => 'number'],
        'tags' => ['name' => '标签', 'type' => 'text', 'is_show' => false],
        'lang' => ['name' => '语言','type' => 'select','is_show' => true,'data' => 'platform.lang_fields'],
        'remark' => ['name' => '备注', 'type' => 'text']
    ];

    public function api()
    {
        return $this->belongsTo('App\Models\Api','api_name','api_name');
    }

    public function getTagsArrayAttribute(){
        return \Str::contains($this->tags,',') ? explode(',',$this->tags) : [$this->tags];
    }

    public function scopeWhereTags($query, $array){
        if(!count($array)) return $query; 

        foreach($array as $item){
            $query = $query->where('tags','like','%'.$item.'%');
        }
        return $query;
        // return $query->where()
    }

    protected $appends = ['game_type_text','game_type_cn_text'];

    public function getGameTypeTextAttribute(){
        return isset_and_not_empty(trans('res.option.game_type'),$this->attributes['game_type'],$this->attributes['game_type']);
    }

    public function getGameTypeCnTextAttribute(){
        return isset_and_not_empty(trans('res.option.game_type',[],'zh_cn'),$this->attributes['game_type'],$this->attributes['game_type']);
    }

    public function getApiGameTypeTextAttribute(){
        return $this->api_name.$this->game_type_text;
    }

    public function scopeDisplayFormatter($query){
        return $query->where('is_open',1)
            ->orderBy('weight','desc')
            ->get(['title','game_type','mobile_pic','tags','params','api_name','weight','lang_json'])
            // 2021-04-30 解决前端接口多语言展示的问题
            ->transform(function($item){
                $item->title = $item->getLangTitle();
                return $item;
            });
    }

    // 0不限，1电脑，2手机
    public function scopeIsMobile($query,$isMobile = 0){
        return $query->whereIn('client_type',$isMobile ? [0,2] : [0,1]);
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getLangJsonArrAttribute(){
        return json_decode($this->lang_json,1);
    }

    public function getLangTitle($lang = ''){
        if(!strlen($lang)) $lang = getRequestLang();
        return Arr::get($this->lang_json_arr,$lang,$this->title);
    }
}
