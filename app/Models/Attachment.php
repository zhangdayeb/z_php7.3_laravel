<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $guarded = ['id'];

    const FILE_TYPE_PIC = "pic";
    const FILE_TYPE_FILE = "file";
    const FILE_TYPE_VIDEO = "video";

    public static $fileTypeMap = [
        self::FILE_TYPE_PIC => '图片',
        self::FILE_TYPE_FILE => '文件',
        self::FILE_TYPE_VIDEO => '视频',
    ];

    public $appends = ["file_url","relative_url"];

    public function getFileUrlAttribute()
    {
        $url = "{$this->domain}{$this->link_path}" . DIRECTORY_SEPARATOR . "{$this->storage_name}";
        return str_replace('\\', "/", $url);
    }

    public function getRelativeUrlAttribute(){
        return "{$this->link_path}" . DIRECTORY_SEPARATOR . "{$this->storage_name}";
    }

    public function getFileTypeTextAttribute()
    {
        return isset_and_not_empty(self::$fileTypeMap, $this->attributes['file_type'], $this->attributes['file_type']);
    }

    public function owner()
    {
        return $this->belongsTo($this->model_type, 'model_id');
    }

    public static $list_field = [
        'owner' => '上传者',
        'ip' => '上传者IP',
        'original_name' => '原始名称',
        'mime_type' => 'MIME类型',
        'file_type' => '文件类型',
        'size' => '大小/kb',
        'category' => '文件归类',
        'domain' => '上传域名',
        'storage_path' => '附件相对 storage 目录地址',
        'link_path' => '附件相对网站根目录地址',
        'storage_name' => '存储名称',
        'remark' => '备注',
        'created_at' => '创建时间',
        'updated_at' => '更新时间'
    ];
}
