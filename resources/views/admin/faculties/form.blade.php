@extends('admin.admin-master')
@section('title', 'Add Faculty')
@section('content-title', ' Faculty')
@section('danh-muc', ' Faculty')
@section('content')

    @include('admin.admin-alert')

    @if($faculty->id)
        {{Form::model($faculty, array('method' => 'put', 'route' =>['faculties.edit' => $faculty->id]))}}
    @else
        {{Form::model($faculty, array('method' => 'post','route' =>'faculties.store'))}}
    @endif
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    {{ Form::label('name', 'Name Faculty') }}
                    {{ Form::text('name', $faculty->name, array('class'=>'form-control')) }}
                </div>
            </div>
        </div>
        {{Form::submit('Submit',array('class'=>'btn btn-primary'))}}
        {{Form::close()}}

@endsection
