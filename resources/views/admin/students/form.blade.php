@extends('admin.admin-master')
@section('title', 'Student')
@section('content-title', ' Student')
@section('content')
    @if($student->id)
        {{ Form::model($student, array('method' => 'PUT', 'route' => ['students.update', $student->id])) }}
    @else
        {{Form::model($student, array('method' => 'post','route' =>'students.store','enctype'=>'multipart/form-data'))}}
    @endif
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                {{ Form::label('name', 'Name Student') }}
                {{ Form::text('name', $student->name, array('class'=>'form-control')) }}
                <h8 class="text-danger">{{ $errors->first('name') }}</h8>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                {{ Form::label('name', 'Email Student') }}
                {{ Form::text('email', $student->email, array('class'=>'form-control')) }}
                <h8 class="text-danger">{{ $errors->first('email') }}</h8>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                {{ Form::label('name', 'Phone Student') }}
                {{ Form::text('phone', $student->phone, array('class'=>'form-control')) }}
                <h8 class="text-danger">{{ $errors->first('phone') }}</h8>
            </div>
            <div class="col">
                <div class="form-outline">
                    {{ Form::label('name', 'Birthday Student') }}
                    {{ Form::date('birthday', $student->birthday, array('class' => 'form-control')) }}
                    <h8 class="text-danger">{{ $errors->first('birthday') }}</h8>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                {{ Form::label('name', 'Address Student') }}
                {{ Form::text('address', $student->address, array('class' => 'form-control')) }}
                <h8 class="text-danger">{{ $errors->first('address') }}</h8>
            </div>
        </div>
    </div>
    <div class="form-outline">
        {{ Form::label('name', 'Gender Student') }}
        {{ Form::radio('gender', '1', true) }}
        Male
        {{ Form::radio('gender', '0', true) }}
        Female
    </div>

    {{Form::submit('Submit',array('class'=>'btn btn-success'))}}
    {{Form::close()}}

@endsection
