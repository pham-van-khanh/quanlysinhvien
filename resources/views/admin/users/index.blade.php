@extends('admin.admin-master')
@section('content-title', __('welcome.list-user'))
@section('title', __('welcome.list-user'))
@section('content')

    <div class="col-2">
        <a href="{{ route('users.create') }}" class="btn btn-info btn-sm"> @lang('welcome.act-create')</a>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('welcome.col-#')</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('welcome.col-name')</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('welcome.col-time')</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('welcome.role')</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('welcome.col-act')</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($data as $index => $item)
                    <tr>
                        <td>
                            {{ $index + 1 }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            @if(!empty($item->getRoleNames()))
                                @foreach($item->getRoleNames() as $v)
                                    <label class="text-sm-center">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning btn-sm"
                               href="{{ route('users.edit', $item->id) }}">@lang('welcome.act-update')</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <style>
            .width {
                width: 100px;
            }
        </style>
        <div>
            {{ $data->links() }}
        </div>
@endsection
