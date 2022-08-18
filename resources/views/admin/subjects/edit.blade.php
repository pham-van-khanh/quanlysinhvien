@extends('admin.admin-master')
@section('title', 'Edit Subject')
@section('content-title', 'Edit Subject')
@section('danh-muc', 'Edit Subject')
@section('content')


    {{Form::open(array('method' => 'put','route' =>['subjects.update',$subject->id]))}}
        @include('admin.admin-alert')
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Name Faculty</label>

                    <input type="text" id="form3Example1" value=" {{ $subject->name }}" name="name"
                           class="form-control" />
                    @error('name')
                    <h6 class="text-danger">{{ $message }} </h6>
                    @enderror
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-danger btn-block mb-4">Cập nhật</button>

        <button type="reset" class="btn btn-warning btn-block mb-4">Nhập lại</button>
            {{Form::close()}}
@endsection
