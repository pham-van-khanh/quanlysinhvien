@extends('admin.admin-master')
@section('title', 'Student')
@section('content-title', ' Student')
@section('content')

    {{Form::model($student, array('method' => 'post','route' =>'students.store','enctype'=>'multipart/form-data'))}}
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                {{ Form::label('name', 'Name Student') }}
                {{ Form::text('name', $student->name, array('class'=>'form-control')) }}
            </div>
            <div class="form-outline">
                <label class="form-label" for="form3Example1">Danh Mục</label>
                <select name="faculty_id" class="form-control" id="">
                    @foreach ($faculties as $item)
                    <option value="{{ $item->id }}"> {{ $item->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-outline">
                {{ Form::label('name', 'Email Student') }}
                {{ Form::text('email', $student->email, array('class'=>'form-control')) }}
            </div>
            <div class="form-outline">
                {{ Form::label('name', 'Phone Student') }}
                {{ Form::text('phone', $student->phone, array('class'=>'form-control')) }}
            </div>
            <div class="row mb-4">
                <div class="col">
                        {{ Form::label('name', 'Birthday Student') }}
                        {{ Form::date('birthday', $student->birthday, array('class'=>'form-control')) }}
                    </div>
                </div>
                <div class="col">
                        {{ Form::label('name', 'Avatar Student') }}
                        {{ Form::file('avatar', array('class'=>'form-control')) }}
                </div>
            </div>
            <div class="form-outline">
                {{ Form::label('name', 'Address Student') }}
                {{ Form::text('address', $student->address, array('class'=>'form-control')) }}
            </div>
            <div class="form-outline">
                {{ Form::label('name', 'Gender Student') }}
                {{ Form::radio('gender', '1', true) }}
                Male
                {{ Form::radio('gender', '0', true) }}
                Female
            </div>
        </div>
    </div>
    {{Form::submit('Submit',array('class'=>'btn btn-success'))}}
    {{Form::close()}}

@endsection
