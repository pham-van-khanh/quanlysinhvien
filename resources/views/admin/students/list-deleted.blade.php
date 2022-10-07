@extends('admin.admin-master')
@section('content-title', 'List Deleted Student')
@section('title', 'List Deleted Student')
@section('content')
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-#')</th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-name')
                    </th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-time-deleted')
                    </th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($student as $index => $item)
                    <tr>
                        <td class="text-center">
                            {{$index+1}}
                        </td>
                        <td class="text-center">
                            {{ $item->name}}
                        </td>
                        <td class="text-center">
                            {{ $item->deleted_at}}
                        </td>
                        <td class="text-center">
                            {!! Form::open(['method' => 'POST','route' => ['student-restore', $item->id]]) !!}
                            {!! Form::submit(__('welcome.act-restore'), ['class' => 'btn btn-primary btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>
            {{$student->links()}}
        </div>
    </div>
@endsection
