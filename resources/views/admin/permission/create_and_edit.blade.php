@extends('layouts.baseframe')

@php
$isUpdated = isset($model->id);
$title = $isUpdated?"权限修改":"权限新增"
@endphp

@section('title', $title ?? '')

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>{{ $title }}</h4>
            <ul class="card-actions">
                <li>
                    <button type="button" onclick="javascript:window.history.go(-1);">
                        <i class="mdi mdi-skip-backward"></i>返回
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body">

            <form method="post" class="form-horizontal"
                action="{{ $isUpdated?route('admin.permissions.update',['permission' => $model->id]):route('admin.permissions.store') }}"
                id="form">

                @csrf

                @if($isUpdated)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $model->id }}">
                @endif

                <div class="form-group">
                    <label class="col-sm-2 control-label">权限名称</label>
                    <div class="col-sm-4">
                        <input type="text" required class="form-control" name="name" placeholder="请输入权限名称"
                            value="{{ $isUpdated?$model->name:"" }}" @if($isUpdated) readonly @endif>
                    </div>
                </div>

                @foreach(config('platform.language_type') as $k => $v)
                    <div class="form-group">
                        <label class="col-sm-2 control-label">权限名称[{{$v}}]</label>
                        <div class="col-sm-4">
                            <input type="text" required class="form-control" name="lang_json[{{ $k }}]" placeholder="请输入权限名称[{{$v}}]"
                                   value="{{ $isUpdated ? $model->getLangName($k):"" }}">
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="col-sm-2 control-label">图标</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="icon" placeholder="请输入图标"
                            value="{{ $isUpdated?$model->icon:"" }}" @if(!$isUpdated) required @endif
                            data-operate="select-icon" data-target="#functions">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">路由名称</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="route_name" placeholder="请输入路由名称" value="{{ $isUpdated?$model->route_name:"" }}"
                            @if(!$isUpdated) required @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">父级菜单</label>
                    <div class="col-sm-4">
                        <select class="form-control m-b js_select2" name="pid">
                            <option value="0">请选择父级菜单...</option>
                            {!! $html !!}
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">是否显示</label>
                    <div class="col-sm-4">
                        @foreach(\App\Models\Permission::$isShowMap as $k => $v)
                        <label class="lyear-radio radio-inline radio-primary"><input type="radio" value="{{ $k }}"
                                name="is_show" @if($isUpdated && $model->is_show === $k) checked @endif > <span>{{ $v }}
                                / {{$k}}</span></label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">权重</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" name="weight" placeholder="请输入权重"
                            value="{{ $isUpdated?$model->weight:"" }}" @if(!$isUpdated) required @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">描述</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="description" placeholder="请输入描述"
                            value="{{ $isUpdated?$model->description:"" }}" @if(!$isUpdated) required @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">备注</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="remark" placeholder="请输入备注"
                            value="{{ $isUpdated?$model->remark:"" }}" @if(!$isUpdated) required @endif>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary" data-operate="ajax-submit" type="button">保存内容</button>
                        <button class="btn btn-default" type="reset">重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
