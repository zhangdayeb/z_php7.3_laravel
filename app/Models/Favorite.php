<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Base
{
    protected $guarded = ['id'];

    public static $list_field = [
        'id' => ['name' => 'ID','is_show' => false],
        'member_id' => ['name' => '会员ID', 'type' => 'number', 'is_show' => true],
        'api_name' => ['name' => '接口标识', 'type' => 'text','is_show' => true],
        'game_type' => ['name' => '游戏类型', 'type' => 'select', 'is_show' => true, 'data' => 'platform.game_type'],
        'model_name' => ['name' => '模型名称','type' => 'text','is_show' => false],
        'model_id' => ['name' => '模型ID','type' => 'number','is_show' => false],
    ];

    const API_GAME_MODEL = 'App\Models\ApiGame';
    const GAMELIST_MODEL = 'App\Models\GameList';

    public function getModelNameByGameType($game_type){
        return in_array($game_type,[3,6]) ? self::GAMELIST_MODEL : self::API_GAME_MODEL;
    }

    public function scopeWhereModel($query,Model $model){
        return $query->where('model_name',get_class($model))->where('model_id',$model->id);
    }

    public function detail(){
        if($this->model_name && $this->model_id){
            return $this->hasOne($this->model_name,'id','model_id');
        }
    }
}
