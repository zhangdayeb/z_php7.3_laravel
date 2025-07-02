@extends('layouts.baseframe')

@php
$title = trans('res.member_yuebao_plan.index.title_interest_history',['name' => $plan->member->name ?? '']);
@endphp

@section('title', $title)

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>{{ $title }}</h4>
                <ul class="card-actions">
                    <li>
                        <button type="button" data-toggle="collapse" href="#searchContent" aria-expanded="false"
                                aria-controls="searchContent">
                            <i class="mdi mdi-chevron-double-down"></i> @lang('res.btn.collapse')
                        </button>
                    </li>
                    <li>
                        <button type="button" onclick="javascript:window.location.reload()">
                            <i class="mdi mdi-refresh"></i> @lang('res.btn.refresh')
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body collapse in" id="searchContent" aria-expanded="true">
                <form action="" method="get" id="searchForm" name="searchForm">
                    <div class="row">
                        @include('layouts._search_field',
                        [
                        'list' => [
                            'calc_at' => ['name' => trans('res.interest_history.field.calc_at'),'type' => 'datetime'],
                            ]
                        ])

                        <div class="col-lg-3 col-sm-3">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">@lang('res.btn.search')</button>&nbsp;
                                <button type="reset" class="btn btn-warning"
                                        onclick="document.searchForm.reset()">@lang('res.btn.reset')</button>&nbsp;
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="card">
            <div class="card-toolbar clearfix">
                <div class="toolbar-btn-action">
                    {{--
                    <a class="btn btn-danger" id="batchDelete" data-operate="delete" data-url="/admin/memberyuebaoplans/ids">
                        <i class="mdi mdi-window-close"></i> 删除
                    </a>
                    --}}
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            @include('layouts._table_header',['data' => \App\Models\InterestHistory::$list_field,'model' => 'interest_history'])
                            <th width="100">@lang('res.interest_history.field.times')</th>
                            {{--<th width=100 style="min-width: 100px;">修改时间</th>--}}
                            <th width=100>@lang('res.common.created_at')</th>
                            <th>操作</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($data as $item)
                            <tr>
                                @include('layouts._table_body',['data' => \App\Models\InterestHistory::$list_field,'item' => $item])
                                <td>第{{ $item->times }}次</td>
{{--                                <td>{{ $item->updated_at }}</td>--}}
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <div class="btn-group">
                                        {{--
                                        <a class="btn btn-xs btn-default"
                                            href="{{ route('admin.memberyuebaoplans.edit',['memberyuebaoplan' => $item->id]) }}" title=""
                                            data-toggle="tooltip" data-original-title="编辑"><i
                                                class="mdi mdi-pencil"></i></a>

                                        <a class="btn btn-xs btn-default" href="javascript:;" data-operate="show-page"
                                            data-toggle="tooltip" data-original-title="详情"
                                            data-url="{{ route('admin.memberyuebaoplans.show', ['memberyuebaoplan' => $item->id]) }}">
                                        <i class="mdi mdi-file-document-box"></i>
                                        </a>

                                        <a class="btn btn-xs btn-default" href="javascript:;" data-operate="delete"
                                            data-toggle="tooltip" data-original-title="删除"
                                            data-url="{{ route('admin.memberyuebaoplans.destroy', ['memberyuebaoplan' => $item->id]) }}">
                                            <i class="mdi mdi-window-close"></i>
                                        </a>
                                         --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="clearfix">
                    <div class="pull-left">
                        <p>总共 <strong style="color: red">{{ $data->total() }}</strong> 条</p>
                    </div>
                    <div class="pull-right">
                        {!! $data->appends($params)->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("footer-js")
    <script>
        //日期时间范围
        laydate.render({
            elem: '#calc_at',
            type: 'datetime',
            theme: "#33cabb",
            range: "~"
        });

    </script>
@endsection
