@extends('admin.admin-master')
@section('title', 'Add Subject')
@section('content-title', 'Add Subject')
@section('danh-muc', 'Add Subject')
@section('content')


    {{Form::open(array('method' => 'post','route' =>'subjects.store'))}}
        @include('admin.admin-alert')
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    {{ Form::label('name', 'Name Subjects') }}
                    {{ Form::text('name',old('name'),array('class'=>'form-control')) }}
                    @error('name')
                        <h6 class="text-danger">{{ $message }} </h6>
                    @enderror
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-danger btn-block mb-4">Create</button>
        <!-- Register buttons -->
        <button type="reset" class="btn btn-warning btn-block mb-4">Reset</button>

    {{Form::close()}}
@endsection
