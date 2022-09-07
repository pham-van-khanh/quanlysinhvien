@extends('admin.admin-master')
@section('content-title', 'List Students')
@section('title', 'List Students')
@section('content')
    <div class="container">
        <form action="{{route('students.index')}}" method="get">
            @csrf
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
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Name
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Name
                        Faculty
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        Avatar
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                        Phone
                        Number
                    </th>
                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Time
                        Create
                    </th>
                    <th></th>
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
                        <td id="name" class="text-center">
                            {{ $item->name }}
                        </td>
                        <td class="text-center">
                            @if(isset($item->faculty))
                                {{ $item->faculty->name }}
                            @else
                                <b class="text-danger"> Students who have not registered any faculties! </b>
                            @endif
                        </td>
                        <td class="text-center">
                            <img src="{{ asset($item->avatar) }}" class="width">
                        </td>
                        <td class="text-center">
                            {{ $item->phone }}
                        </td>
                        <td class="text-center">
                            {{ $item->created_at }}
                        </td>
                        @can('edit')
                            <td class="text-center">
                                <a style="color: #febc06" href="" onclick="update({{ $item->id }})"
                                   data-bs-toggle="modal"
                                   data-bs-target="#edit-bookmark" id="editStudent" data-id="{{ $item->id }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        @endcan
                        <td class="text-center">
                            <a style="color: red" href="{{ route('students.destroy', $item->id) }}"
                               class="btnDelete">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
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
            .width {
                width: 100px;
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

