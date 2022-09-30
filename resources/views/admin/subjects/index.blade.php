@extends('admin.admin-master')
@section('title', __('welcome.list-subject'))
@section('content-title', __('welcome.list-subject'))
@section('content')
    <div class="col-2 flex-md-grow-1">
        @can('create')
            <a href="{{ route('subjects.create') }}"
               class="btn btn-info btn-sm"> @lang('welcome.act-create') </a>
        @endcan
    </div>
    <div class="card-body px-0 pb-0">
        <table class="table table-responsive-sm">
            <thead>
            <tr>
                <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">@lang('welcome.col-#')</th>
                <th class="text-uppercase text-secondary  text-xxs font-weight-bolder opacity-7">@lang('welcome.col-name')
                </th>
                @if(Auth::user()->roles[0]->name == $admin)
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        @lang('welcome.col-act')
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        @lang('welcome.act-update-point')
                    </th>
                @else
                    <th></th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        @lang('welcome.col-point')
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        @lang('welcome.act-register')
                    </th>
                @endif
            </tr>
            </thead>
            <tbody>
            <form action="{{route('resgistation')}}" method="post">
                @csrf
                @foreach($subjects as $index => $subject)
                    <tr>
                        <td class="text-center">{{$index + 1}}</td>
                        <td><b>{{$subject->name}}</b></td>
                        <td class="text-center">
                            @can('edit')
                                <a style="color: #febc06" href="{{ route('subjects.edit', $subject->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            @endcan
                            @can('delete')
                                <a style="color: red" href="{{ route('subjects.destroy', $subject->id) }}"
                                   class="btnDelete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @endcan
                        </td>
                        @if(Auth::user()->roles[0]->name == $roleStudent)
                            @if(isset($getMark))
                                <td></td>
                                <td class=" text-center"><input name="subject_id[]"
                                                                value="{{$subject->id}}" type="checkbox"></td>
                            @else
                                @for($i = 0; $i < $studentSubject->count(); $i++)
                                    @if($subject->id == $studentSubject[$i]->id)
                                        @if(!$studentSubject[$i]->pivot->mark)
                                            <td class="text-success text-sm text-center">@lang('welcome.row-studying')</td>
                                            <td class="text-center "><input disabled type="checkbox" checked></td>
                                        @else
                                            <td class="text-center">{{$studentSubject[$i]->pivot->mark}}/10</td>
                                            <td class="text-center"><input disabled type="checkbox" checked></td>
                                        @endif
                                        @break
                                    @elseif($i == $studentSubject->count() - 1)
                                        @if($subject->id != $studentSubject[$i]->id)
                                            <td></td>
                                            <td class="text-center">
                                                <input name="subject_id[]"
                                                       value="{{$subject->id}}"
                                                       type="checkbox">
                                            </td>
                                        @endif
                                    @endif
                                @endfor
                            @endif
                        @else
                            <td class="text-center">
                                <a class="gradient-button gradient-button-3 btn-sm"
                                   href="{{route('subjects.show', $subject->id)}}">
                                    <i class="fa fa-arrow-up text-white"></i>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                @if(Auth::user()->roles[0]->name == $roleStudent)

                    @if($student->subjects)
                        @if(!'checkbox')
                            <button disabled class="btn btn-outline-secondary btn-sm text-danger"> GPA:  </button>
                        @else
{{--                            <button type="submit" class="btn btn-outline-success btn-sm"> Registration</button>--}}
                        @endif
                    @else
                        2
                    @endif
                @endif
            </form>
            </tbody>
        </table>
        <form action="" method="POST" id="form-delete">
            {{ method_field('DELETE') }}
            {!! csrf_field() !!}
        </form>
        <div>
            {{$subjects->links()}}
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <style>
            a {
                font-size: 20px;
            }
        </style>
        <style>
            .gradient-button {
                margin: 5px;
                font-family: "Arial Black", Gadget, sans-serif;
                font-size: 15px;
                padding: 5px;
                text-align: center;
                text-transform: uppercase;
                transition: 0.5s;
                background-size: 200% auto;
                color: #FFF;
                box-shadow: 0 0 20px #eee;
                border-radius: 10px;
                width: 32px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
                cursor: pointer;
                display: inline-block;
                border-radius: 55px;
            }

            .gradient-button-3 {
                background-image: linear-gradient(to right, #7474BF 0%, #348AC7 51%, #7474BF 100%)
            }

            .gradient-button-3:hover {
                background-position: right center;
            }

            .width {
                width: 50px;
            }
        </style>
        <script>
            $('.btnDelete').click(function (e) {
                e.preventDefault();
                var href = $(this).attr('href');
                $('#form-delete').attr('action', href);
                if (confirm('Are you sure?')) {
                    $('#form-delete').submit();
                }
            });
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    </div>
@endsection
