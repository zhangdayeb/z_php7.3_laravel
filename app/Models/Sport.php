<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public $guarded = ['id'];

    public static $list_field = [
        'home_team_name' => ['name' => '主队名称','type' => 'text','validate' => 'required','is_show' => true],
        'home_team_name_en' => ['name' => '主队名称英文','type' => 'text','validate' => 'required','is_show' => false],
        'home_team_img' => ['name' => '主队图片','type' => 'picture','validate' => 'required','is_show' => true],
        'home_odds' => ['name' => '主队赔率','type' => 'number','validate' => 'required','is_show' => true],

        'visiting_team_name' => ['name' => '客队名称','type' => 'text','validate' => 'required','is_show' => true],
        'visiting_team_name_en' => ['name' => '客队名称英文','type' => 'text','validate' => 'required','is_show' => false],
        'visiting_team_img' => ['name' => '客队图片','validate' => 'required','type' => 'picture','is_show' => true],
        'visiting_odds' => ['name' => '客队赔率','type' => 'number','validate' => 'required','is_show' => true],

        'let_ball' => ['name' => '让球','type' => 'number','validate' => 'required','is_show' => true],

        'match_cup' => ['name' => '比赛名称','type' => 'text','validate' => 'required'],
        'match_cup_en' => ['name' => '比赛名称英文','type' => 'text','validate' => 'required','is_show' => false],

        'match_at' => ['name' => '比赛时间','validate' => 'required','type' => 'datetime'],

        'is_open' => ['name' => '是否开启','type' => 'radio','validate' => 'required','data' => 'platform.boolean','style' => 'platform.style_boolean','is_show' => true],
        'weight' => ['name' => '权重','type' => 'number'],
    ];
}
