<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemNotice extends Base
{   
    protected $guarded = ['id'];

    public static $list_field = [
        'title' => ['name' => '标题', 'type' => 'text', 'validate' => 'required','is_show' => true],
        'content' => ['name' => '公告内容', 'type' => 'text', 'validate' => 'required','is_show' => false],
        'group_name' => ['name' => '分组名', 'type' => 'select','is_show' => true,'data' => 'platform.notice_group'],
        'weight' => ['name' => '权重', 'type' => 'text', 'is_show' => true],
        'url' => ['name' => '跳转链接', 'type' => 'text', 'is_show' => true],
        'is_open' => ['name' => '是否启用', 'type' => 'radio','is_show' => true,'data' => 'platform.is_open','style' => 'platform.style_isopen'],
        'lang' => ['name' => '语言','type' => 'select','is_show' => true,'data' => 'platform.lang_fields'],
    ];

    const GROUP_MAIN = 'main'; // 首页公告
    const GROUP_CREDIT = 'credit'; // 借呗公告
    const GROUP_PC = 'pc'; // 电脑弹窗
    const GROUP_MOBILE = 'mobile'; // 手机弹窗

    public function scopeGroupName($query,$name){
        return $query->where('group_name',$name)->where('is_open',1)->orderBy('weight','desc');
    }

    public function scopeIsApp($query){
        return $query->where('is_app',isApp());
    }

    public function scopeGetContentStr($query){
        $data = $query->pluck('content')->toArray();
        return is_array($data)?implode(' - ',$data):'暂无公告';
    }
}
