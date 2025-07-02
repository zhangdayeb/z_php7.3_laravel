<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        // 'id' => ['name' => 'ID','is_show' => false],
        'key' => ['name' => '标识','type' => 'text','is_show' => true],
        'name' => ['name' => '名称','type' => 'text','is_show' => true],
        'url' => ['name' => '官网','type' => 'text','is_show' => true],
        'is_open' => ['name' => '是否开放','type' => 'radio','validate' => 'required','data' => 'platform.is_open','is_show' => true,'style' => 'platform.style_boolean'],
        'weight' => ['name' => '权重','type' => 'number'],
        'lang' => ['name' => '语言/币种','type' => 'select','is_show' => true,'data' => 'platform.lang_select'],
    ];

    // App\Models\Bank::getBankArray();
    public static function getBankArray($lang = Base::LANG_CN){
        return self::where('lang',$lang)->getBankArrayCondition()->toArray();
    }

    // App\Models\Bank::getAllBankArray();
    public static function getAllBankArray(){
        return self::getBankArrayCondition();
    }

    public function scopeGetBankArrayCondition($query){
        return $query->where('is_open',1)
            ->orderByDesc('weight')->pluck('name','key');
    }
}
