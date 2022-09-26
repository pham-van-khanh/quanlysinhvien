@extends('admin.admin-master')
@section('title', __('welcome.act-create'). ' '.  __('welcome.subject'))
@section('content-title', __('welcome.act-create'). ' '.  __('welcome.subject'))
@section('content')
    @if($subject->id)
        {{Form::model($subject, array('method' => 'put','route' =>['subjects.update', $subject->id]))}}
    @else
        {{Form::model($subject, array('method' => 'post','route' =>'subjects.store'))}}
    @endif
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                {{ Form::label('name', __('welcome.col-name')) }}
                {{ Form::text('name', $subject->name, array('class'=>'form-control')) }}
                <h8 class="text-danger">{{ $errors->first('name') }}</h8>
            </div>
        </div>
    </div>
    {!! Form::submit(__('welcome.act-submit'), ['class' => 'btn btn-primary btn-sm']) !!}
    {{Form::close()}}
    @if($subject->id)
        {{ Form::model($subject, array('route' => ['subjects.destroy', $subject->id], 'method' => 'DELETE'))}}
        {{ Form::submit(__('welcome.act-delete'), ['class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"])}}
        {{ Form::close() }}
    @endif
@endsection
