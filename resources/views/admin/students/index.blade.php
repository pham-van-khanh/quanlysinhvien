@extends('admin.admin-master')
@section('content-title', 'List Students')
@section('title', 'List Students')
@section('content')
    <div class="container">
        <form action="{{route('students.index')}}" method="get">
            <div class="row">
                <div class="col-sm-3">
                    <label class="form-label" for="form3Example1">Age From</label>
                    <input type="number" class="form-control input-sm" id="fromOld" name="age_from" require>
                </div>
                <div class="col-sm-3">
                    <label class="form-label" for="form3Example1">Age to</label>
                    <input type="number" class="form-control input-sm" id="toOld" name="age_to" require>
                </div>
                <div class="col-sm-3">
                    <button style="margin-top: 35px" type="submit" class="btn btn-outline-success btn-sm" name="search">
                        Filter
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-2 flex-md-grow-1">
        @can('create')
            <a href="{{ route('students.create') }}"
               class="btn btn-info btn-sm"> Add Students </a>
        @endcan
    </div>
    <div class="card-body px-0 pb-0">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        Stt
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        Avatar
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Name
                        Faculty
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        Learned
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        Update Point
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">AVG
                        Point
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        <a href="{{ route('student-list-deleted') }}"
                           class="btn btn-secondary btn-sm"> Deleted Student </a>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $index => $item)
                    <tr>
                        <td id="id" class="text-center">
                            {{ $index + 1 }}
                        </td>
                        <td id="name">
                            {{ $item->name }}
                        </td>
                        <td class="text-center">
                            <img src="{{ asset($item->avatar) }}" class="width">
                        </td>
                        <td class="text-center">
                            @if(isset($item->faculty))
                                {{ $item->faculty->name }}
                            @else
                                <b class="text-danger">  Have Not Registered Any Faculties! </b>
                            @endif
                        </td>
                        <td class="text-center">
                            {{ $item->subjects->count() .'/'. $countSubject }}
                        </td>
                        <td class="text-center">
                            <a class="gradient-button gradient-button-3"
                               href="{{ route('updatePoint', $item->id) }}">
                                <i class="fa fa-arrow-up text-white"></i>
                            </a>
                        </td>
                        @if($item->subjects->count() == 0)
                            <td class="text-sm text-warning text-sm-center"> Haven't Registered</td>
                        @elseif($item->subjects->count() < $countSubject)
                            <td class="text-sm text-success text-sm-center"> Studying</td>
                        @else
                            @for($i=0; $i < $countSubject; $i++)
                                @if(!$item->subjects[$i]->pivot->mark)
                                    <td class="text-sm text-center text-success text-sm-center"> Studying</td>
                                    @break
                                @elseif($i == $countSubject - 1)
                                    @if(round($item->subjects->avg('pivot.mark'), 2) < $avg)
                                        <td class="text-center text-danger"> {{round($item->subjects->avg('pivot.mark'), 2)}} </td>
                                    @else
                                        <td class="text-center"> {{round($item->subjects->avg('pivot.mark'), 2)}} </td>
                                    @endif
                                @endif
                            @endfor
                        @endif
                        <td class="text-center">
                            @can('edit')
                                <a style="color: #febc06" href="{{route('students.edit', $item->id)}}" >
                                    <i class="fa fa-edit"></i>
                                </a>
{{--                                <a style="color: #febc06" href="" onclick="update({{ $item->id }})"--}}
{{--                                   data-bs-toggle="modal"--}}
{{--                                   data-bs-target="#edit-bookmark" id="editStudent" data-id="{{ $item->id }}">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                </a>--}}
                            @endcan
                            @can('delete')
                                <a style="color: red" href="{{ route('students.destroy', $item->id) }}"
                                   class="btnDelete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ Form::model($students, ['route' => ['mail_subjects_all'], 'method' => 'get'])}}
            <button type="submit" class="btn btn-outline-warning btn-sm"
                    onclick="return confirm('Do you want send to student?')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                          d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                </svg>
            </button>
            {{ Form::close()}}
            <form action="" method="POST" id="form-delete">
                {{ method_field('DELETE') }}
                {!! csrf_field() !!}
            </form>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="{{asset('dist/js/edit_student.js')}}"></script>
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
        </div>
        <style>
            .gradient-button {
                margin: 5px;
                font-family: "Arial Black", Gadget, sans-serif;
                font-size: 20px;
                padding: 5px;
                text-align: center;
                text-transform: uppercase;
                transition: 0.5s;
                background-size: 200% auto;
                color: #FFF;
                box-shadow: 0 0 20px #eee;
                border-radius: 10px;
                width: 42px;
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
        <div>
            {{ $students->links() }}
        </div>

        <div class="modal fade modal-bookmark" id="edit-bookmark" tabindex="-1" style="display: none;"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Student</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form-bookmark needs-validation" novalidate="">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    {!! Form::label('', 'Name')!!}
                                    {!! Form::text('name' ,'', ['class' => 'form-control' , 'id' => 'nameStudent'])!!}

                                    {!! Form::label('', 'Phone number ')!!}
                                    {!! Form::text('phone' ,'', ['class' => 'form-control' , 'id' => 'phoneStudent'])!!}

                                    {!! Form::label('', 'Faculty')!!}
                                    {!!Form::select('faculty_id', $faculties,'', ['id' => 'faculty_id', 'class' => 'form-control'])!!}

                                    {!! Form::label('', 'Address Student')!!}
                                    {!! Form::text('address' ,'', ['class' => 'form-control' , 'id' => 'addressStudent'])!!}

                                    {{ Form::label('', 'Gender', ['class' => 'col-form-label pt-0']) }}
                                    <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                        @if ($errors->first('gender'))
                                            <div class="radio radio-primary">
                                                {{Form::radio('gender', '0', true, ['class' => 'form-check-input is-invalid', 'id' => 'radioinline11'])}}
                                                {{ Form::label('radioinline11', 'Male', ['class' => 'mb-0']) }}
                                            </div>
                                            <div class="radio radio-primary">
                                                {{Form::radio('gender', '1', false, ['class' => 'form-check-input is-invalid', 'id' => 'radioinline22'])}}
                                                {{ Form::label('radioinline22', 'Female', ['class' => 'mb-0']) }}
                                            </div>
                                            <div class="invalid-feedback">{{$errors->first('gender')}}</div>
                                        @else
                                            <div class="radio radio-primary">
                                                {{Form::radio('gender', '0', true, ['class' => 'form-check-input', 'id' => 'radioinline11'])}}
                                                {{ Form::label('radioinline11', 'Male', ['class' => 'mb-0']) }}
                                            </div>
                                            <div class="radio radio-primary">
                                                {{Form::radio('gender', '1', false, ['class' => 'form-check-input', 'id' => 'radioinline22'])}}
                                                {{ Form::label('radioinline22', 'Female', ['class' => 'mb-0']) }}
                                            </div>
                                        @endif
                                    </div>
                                    {!! Form::label('', 'Birthday student')!!}
                                    {!! Form::date('birthday', '', ['class' => 'form-control' , 'id' => 'birthdayStudent'])!!}

                                    {!! Form::label('', 'Email')!!}
                                    {!! Form::text('email' ,'', ['class' => 'form-control' , 'id' => 'emailStudent', 'readonly'])!!}
                                </div>
                            </div>
                            <input type="hidden" name="student_id" id="student_id">
                            <br>
                            <button class="btn btn-secondary" type="button" id="saveUpdateForm" onclick="saveUpdate()">
                                Save
                            </button>
                            <button class="btn btn-primary" type="button">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <style>
            a {
                font-size: 20px;
            }
        </style>
    </div>
@endsection

