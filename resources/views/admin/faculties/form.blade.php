@extends('admin.admin-master')
@section('title', __('welcome.act-create'). ' '.  __('welcome.faculty'))
@section('content-title', __('welcome.act-create'). ' '.  __('welcome.faculty'))
@section('content')
    @if($faculty->id)
        {{ Form::model($faculty, array('method' => 'PUT', 'route' => ['faculties.update', $faculty->id])) }}
    @else
        {{ Form::model($faculty, ['method' => 'POST', 'route' => 'faculties.store']) }}
    @endif
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                {{ Form::label('name', __('welcome.col-name')) }}
                {{ Form::text('name', $faculty->name, ['class'=>'form-control']) }}
                <h8 class="text-danger">{{ $errors->first('name') }}</h8>
            </div>
        </div>
    </div>
    {{ Form::submit( __('welcome.act-submit'), ['class'=>'btn btn-primary btn-sm'] )}}
    {{ Form::close() }}

    @if($faculty->id)
        {{ Form::model($faculty, array('route' => ['faculties.destroy', $faculty->id], 'method' => 'DELETE'))}}
        {{ Form::submit(__('welcome.act-delete'), ['class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"])}}
        {{ Form::close() }}
    @endif
    {{ Form::close() }}
@endsection
