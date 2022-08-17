@extends('admin.admin-master')
@section('title', 'Edit Faculty')
@section('content-title', 'Edit Faculty')
@section('danh-muc', 'Edit Faculty')
@section('content')


    <form action="{{route('faculties.update',$faculty->id)}} " method="post" enctype="multipart/form-data">
        @method('PUT')
        <br>
        @csrf
        @include('admin.admin-alert')
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <label class="form-label" for="form3Example1">Name Faculty</label>

                    <input type="text" id="form3Example1" value=" {{ $faculty->name }}" name="name"
                           class="form-control" />
                    @error('name')
                    <h6 class="text-danger">{{ $message }} </h6>
                    @enderror
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-danger btn-block mb-4">Cập nhật</button>

        <button type="reset" class="btn btn-warning btn-block mb-4">Nhập lại</button>

    </form>
@endsection
