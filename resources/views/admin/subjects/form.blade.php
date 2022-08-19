@extends('admin.admin-master')
@section('title', 'Add Faculty')
@section('content-title', ' Faculty')
@section('danh-muc', ' Faculty')
@section('content')

    @include('admin.admin-alert')
    @if($subject->id)
        {{Form::model($subject, array('method' => 'post','route' =>'subjects.store'))}}
    @else
        {{Form::model($subject, array('method' => 'put','route' =>['subjects.edit' => $subject->id]))}}
    @endif
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    {{ Form::label('name', 'Name Faculty') }}
                    {{ Form::text('name', $subject->name, array('class'=>'form-control')) }}
                </div>
            </div>
        </div>
       {{Form::button('Submit',array('class'=>'btn btn-primary'))}}
        {{Form::close()}}
@endsection
