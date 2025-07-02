<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankCard extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'card_no' => ['name' => '卡号', 'type' => 'text', 'validate' => 'required', 'is_show' => true],
        'card_type' => ['name' => '卡类型', 'type' => 'radio', 'is_show' => true,'data' => 'platform.card_type'],
        'bank_type' => ['name' => '银行类型', 'type' => 'select', 'is_show' => true, 'data' => 'platform.bank_type'],
        'phone' => ['name' => '办卡预留手机号', 'type' => 'text', 'is_show' => true],
        'owner_name' => ['name' => '持卡人姓名', 'type' => 'text','validate' => 'required', 'is_show' => true],
        'bank_address' => ['name' => '开户行地址', 'type' => 'text', 'is_show' => true],
        'is_open' => ['name' => '是否启用','type' => 'radio','validate' => 'required','data' => 'platform.is_open','is_show' => true,'style' => 'platform.style_boolean'],            
    ];

    public $appends = ['bank_type_text'];

    public function getBankTypeTextAttribute(){
        return isset_and_not_empty(config('platform.bank_type'), $this->attributes['bank_type'], $this->attributes['bank_type']);
    }
}
