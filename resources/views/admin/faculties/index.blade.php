@extends('admin.admin-master')
@section('content-title', __('welcome.list-faculty') )
@section('title', __('welcome.list-faculty'))
@section('content')
    <div class="col-2 flex-md-grow-1">
        @can('create')
            <a href="{{ route('faculties.create') }}"
               class="btn btn-info btn-sm"> @lang('welcome.act-create') </a>
        @endcan
    </div>

    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-#')</th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-name')
                    </th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-time')
                    </th>
                    <th></th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">
                        @if(Auth::user()->roles[0]->name == $student)
                            @lang('welcome.act-register')
                        @endif
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($faculties as $index => $item)
                    <tr>
                        <td class="text-center">
                            {{$index+1}}
                        </td>
                        <td class="text-center">
                            {{ $item->name}}
                        </td>
                        <td class="text-center">
                            {{ $item->created_at}}
                        </td>
                        <td class="text-center">
                            @can('edit')
                                <a style="color: #febc06" href="{{ route('faculties.edit', $item->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('delete')
                                <a style="color: red"
                                   href="{{ route('faculties.destroy', ['faculty' => $item->id]) }}" class="btnDelete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @endcan
                        </td>
                        @if(Auth::user()->roles[0]->name == $student)
                            <td class="text-center">
                                {{ Form::open(['route' => ['registerFaculty', $item->id], 'method' => 'put']) }}
                                {{ Form::button('<i class="fa fa-check" style="color: white"></i>', ['class' => 'btn btn-info btn-sm', 'type' => 'submit']) }}
                                {{ Form::close() }}
                            </td>
                        @endif
                    </tr>

                @endforeach
            </table>
            <form action="" method="POST" id="form-delete">
                {{ method_field('DELETE') }}
                {!! csrf_field() !!}
            </form>
        </div>
        <div>
            {{$faculties->links()}}
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="{{asset('dist/js/edit_student.js')}}"></script>
    </div>
@endsection
