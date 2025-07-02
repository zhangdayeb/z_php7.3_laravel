<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelConfig extends Model
{
    public $guarded = ['id'];

    public static $list_field = [
        'level' => ['name' => '等级','type' => 'number','validate' => 'required','is_show' => true],
        'level_name' => ['name' => '等级名称','type' => 'text','validate' => 'required','is_show' => true],
        'deposit_money' => ['name' => '晋升所需存款金额','type' => 'number','validate' => 'required','is_show' => true],
        'bet_money' => ['name' => '晋升所需投注金额','type' => 'number','validate' => 'required','is_show' => true],
        'level_bonus' => ['name' => '晋升礼金','type' => 'number','validate' => 'required','is_show' => true],
        'day_bonus' => ['name' => '每日礼金','type' => 'number','validate' => 'required','is_show' => true],
        'week_bonus' => ['name' => '每周礼金','type' => 'number','validate' => 'required','is_show' => true],
        'month_bonus' => ['name' => '每月礼金','type' => 'number','validate' => 'required','is_show' => true],
        'year_bonus' => ['name' => '每年礼金','type' => 'number','validate' => 'required','is_show' => true],
        'credit_bonus' => ['name' => '借呗额度奖励','type' => 'number','validate' => 'required','is_show' => true],
        'levelup_type' => ['name' => '晋升条件类型','type' => 'select','validate' => 'required','is_show' => true,'data' => 'platform.levelup_types'],
        'lang' => ['name' => '语言/币种','type' => 'select','is_show' => true,'data' => 'platform.lang_select'],
    ];

    const TYPE_DEPOSIT_MONEY = 1;
    const TYPE_BET_MONEY = 2;
    const TYPE_ANY = 3;
    const TYPE_ALL = 4;

    public function isMemberLevelUp($total_bet,$total_deposit){
        switch ($this->levelup_type){
            case self::TYPE_DEPOSIT_MONEY:
                return $this->deposit_money <= $total_deposit;
            case self::TYPE_BET_MONEY:
                return $this->bet_money <= $total_bet;
            case self::TYPE_ANY:
                return $this->deposit_money <= $total_deposit || $this->bet_money <= $total_bet;
            case self::TYPE_ALL:
                return $this->deposit_money <= $total_deposit && $this->bet_money <= $total_bet;
        }
        return false;
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
