@extends('admin.admin-master')
@section('title', 'Add Faculty')
@section('content-title', 'Add Faculty')
@section('danh-muc', 'Add Faculty')
@section('content')

    @include('admin.admin-alert')
   {{Form::open(array('method' => 'post','route' =>'faculties.store'))}}
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                  {{    Form::label('name', 'Name Faculty') }}
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
