<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YjLevel extends Model
{
    public $guarded = ['id'];

    public static $list_field = [
        'level' => ['name' => '佣金等级','type' => 'number','validate' => 'required','is_show' => true],
        'name' => ['name' => '等级名称','type' => 'string','validate' => 'required','is_show' => true],
        'active_num' => ['name' => '下线活跃人数','type' => 'number','validate' => 'required','is_show' => true],
        'min' => ['name' => '最低流水金额','type' => 'number','validate' => 'required','is_show' => true],
        'rate' => ['name' => '佣金比例（百分比）','type' => 'number','validate' => 'required','is_show' => true],
        'lang' => ['name' => '币种','type' => 'select','is_show' => true,'data' => 'platform.lang_fields'],
    ];

    public static function getYjLevel($num,$money,$lang = Base::LANG_CN){
        return YjLevel::where('active_num','<=',$num)->where('min','<=',$money)->where('lang',$lang)->orderBy('level','desc')->first();
    }
}
