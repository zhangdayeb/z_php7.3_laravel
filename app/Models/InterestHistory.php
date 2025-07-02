<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterestHistory extends Model
{
    protected $guarded = ['id'];

    public static $list_field = [
        'member_plan_id' => ['name' => '会员方案ID','type' => 'number','is_show' => false],
        'interest' => ['name' => '利息','type' => 'number' ,'is_show' => true],
        'times' => ['name' => '次数','type' => 'number' ,'is_show' => false],
        'calc_at' => ['name' => '结算时间','type' => 'text','is_show' => true]
    ];
}
