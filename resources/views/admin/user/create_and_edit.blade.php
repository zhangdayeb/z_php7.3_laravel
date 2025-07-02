@extends('layouts.baseframe')
@php
$isUpdated = isset($model->id);
// $title = $isUpdated?"管理员修改":"管理员新增"
@endphp
@section('title', $_title)

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>{{ $_title }}</h4>
            <ul class="card-actions">
                <li>
                    <button type="button" onclick="javascript:window.history.go(-1);">
                        <i class="mdi mdi-skip-backward"></i> @lang('res.btn.back')
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body">

            <form method="post" class="form-horizontal"
                action="{{ $isUpdated?route('admin.users.update',['user' => $model->id]):route('admin.users.store') }}"
                id="form">

                @csrf

                @if($isUpdated)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $model->id }}">
                @endif

                <div class="form-group">
                    <label class="col-sm-2 control-label">@lang('res.user.field.name')</label>
                    <div class="col-sm-4">
                        <input type="text" required class="form-control" name="name"
                            value="{{ $isUpdated?$model->name:"" }}" @if($isUpdated) readonly @endif>
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label class="col-sm-2 control-label">email</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="email" placeholder="请输入电子邮件" value="{{ $isUpdated?$model->email:"" }}"
                            @if(!$isUpdated) required @endif>
                    </div>
                </div> --}}

                <div class="form-group">
                    <label class="col-sm-2 control-label">@lang('res.user.field.password')</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="password" value=""
                            @if(!$isUpdated) required @endif>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">@lang('res.user.field.status')</label>
                    <div class="col-sm-4">
                        <select name="status" class="form-control js_select2">
                            <option value="">@lang('res.common.select_default')</option>
                            @foreach(trans('res.user.status') as $key =>$value)
                            <option value="{{ $key }}" @if($isUpdated && $model->status == $key) selected @endif>
                                {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-primary" data-operate="ajax-submit" type="button">@lang('res.btn.save')</button>
                        <button class="btn btn-default" type="reset">@lang('res.btn.reset')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
