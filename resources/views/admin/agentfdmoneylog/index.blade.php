@extends('layouts.baseframe')

@section('title', $_title)

@section('content')
<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>{{ $_title }}</h4>
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
                        'created_at' => ['name' => trans('res.common.created_at'),'type' => 'datetime'],
                        'agent_member_id' => ['name' => trans('res.common.member_name'),'type' => 'select','data' => \App\Models\Member::getMemberArray()]

                        ]
                    ])

                    <div class="col-lg-2 col-sm-2">
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
                <a class="btn btn-danger" id="batchDelete" data-operate="delete" data-url="/admin/agentfdmoneylogs/ids">
                    <i class="mdi mdi-window-close"></i> @lang('res.btn.delete')
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <label class="lyear-checkbox checkbox-primary">
                                    <input type="checkbox" id="check-all"><span></span>
                                </label>
                            </th>
                            <th style="min-width: 80px;">@lang('res.common.agent_id')</th>
                            @include('layouts._table_header',['data' => \App\Models\AgentFdMoneyLog::$list_field,'model' => 'agent_fd_money_log'])
                            {{--<th width=100>修改时间</th>--}}
                            <th width=100>@lang('res.common.created_at')</th>
                            <th>@lang('res.common.operate')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                <label class="lyear-checkbox checkbox-primary">
                                    <input type="checkbox" name="ids[]" value="{{ $item->id }}"><span></span>
                                </label>
                            </td>
                            <td>{{ $item->agent_member->name ?? trans('res.common.deleted') }}</td>
                            @include('layouts._table_body',['data' => \App\Models\AgentFdMoneyLog::$list_field,'item' => $item])
{{--                            <td>{{ $item->updated_at }}</td>--}}
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="btn-group">
                                    {{--
                                    <a class="btn btn-xs btn-default"
                                        href="{{ route('admin.agentfdmoneylogs.edit',['agentfdmoneylog' => $item->id]) }}" title=""
                                        data-toggle="tooltip" data-original-title="编辑"><i
                                            class="mdi mdi-pencil"></i></a>
                                    --}}

                                    <a class="btn btn-xs btn-default" href="javascript:;" data-operate="show-page"
                                        data-toggle="tooltip" data-original-title="@lang('res.btn.detail')"
                                        data-url="{{ route('admin.agentfdmoneylogs.show', ['agentfdmoneylog' => $item->id]) }}">
                                        <i class="mdi mdi-file-document-box"></i>
                                    </a>

                                    <a class="btn btn-xs btn-default" href="javascript:;" data-operate="delete"
                                        data-toggle="tooltip" data-original-title="@lang('res.btn.delete')"
                                        data-url="{{ route('admin.agentfdmoneylogs.destroy', ['agentfdmoneylog' => $item->id]) }}">
                                        <i class="mdi mdi-window-close"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td>@lang('res.common.sum')</td>
                            <td colspan="5"></td>
                            <td>{{ $total_fd_money }}</td>
                            <td colspan="6"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="clearfix">
                <div class="pull-left">
                    <p>@lang('res.common.total') <strong style="color: red">{{ $data->total() }}</strong> @lang('res.common.count')</p>
                </div>
                <div class="pull-right">
                    {!! $data->appends($params)->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection