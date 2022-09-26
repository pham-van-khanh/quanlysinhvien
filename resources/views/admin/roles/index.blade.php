@extends('admin.admin-master')
@section('content-title', __('welcome.list-role'))
@section('title', __('welcome.list-role'))
@section('content')

    <form action="">
        <div style="width:250px" class="input-group input-group-outline">
            <label class="form-label">Search here...</label>
            <input type="text" name="search" class="form-control">
        </div>

    </form>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('welcome.col-#')</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">@lang('welcome.col-name')</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                            <a href="{{ route('roles.create') }}" class="btn btn-info btn-sm"> Add Role </a>
                        </th>
                    </tr>
                </thead>
                <tbody>

                @foreach ($roles as $key => $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
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
            {{ $roles->links() }}
        </div>
         @endsection
