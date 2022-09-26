@extends('admin.admin-master')
@section('content-title', __('welcome.list-student-registed'))
@section('title',  __('welcome.list-student-registed'))
@section('content')
    <link href='https://css.gg/export.css' rel='stylesheet'>
    <div class="col-5 flex-md-grow-1 border border-dashed">
        <center>
            <b class="text-success">{{$subjects->name}}</b>
        </center>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-#')</th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-name')
                    </th>
                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">@lang('welcome.col-point')
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subjects->students as $index => $item)
                    <tr>
                        <td class="text-center">
                            {{$index+1}}
                        </td>
                        <td class="text-center">
                            {{ $item->name}}
                        </td>
                        <td class="text-center">
                            {{ $item->pivot->mark}}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div>
            <div class="row">
                <div class="col mr-2">
                    <a data-bs-toggle="tooltip" data-bs-placement="right" title="Export Excel"
                       class="btn-outline-dark"
                       href="{{route('export', $subjects->id )}}">
                        <i style="font-size: 30px" class="fas fa-file-download"></i>
                    </a>
                </div>
                <div id="coss" class="col mr-2">
                    <form enctype="multipart/form-data" action="{{route('import', $subjects->id)}}" method="POST">
                        @csrf
                        <div class="file-upload">
                            <div class="file-upload-select">
                                <div class="file-select-button">Upload File Excel</div>
                                <div class="file-select-name">No file chosen...</div>
                                <input type="file" name="import_file" style="display:show;"
                                       onClick="toggleButton()" id="file-upload-input">
                            </div>
                            <button type="submit" class="hidden gradient-button gradient-button-1" id="button">
                                <i class='fa fa-upload'></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <link href="{{asset('dist/css/list_student_registed.css')}}" rel="stylesheet">
    <script src="{{asset('dist/js/list_student_registed.js')}}"></script>
    <script type="text/JavaScript"
            src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
@endsection
