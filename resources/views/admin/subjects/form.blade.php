@extends('admin.admin-master')
@section('title', 'Subject')
@section('content-title', ' Subject')
@section('content')
    @if($subject->id)
        {{Form::model($subject, array('method' => 'put','route' =>['subjects.update', $subject->id]))}}
    @else
        {{Form::model($subject, array('method' => 'post','route' =>'subjects.store'))}}
    @endif
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                {{ Form::label('name', 'Name Subject') }}
                {{ Form::text('name', $subject->name, array('class'=>'form-control')) }}
                <h8 class="text-danger">{{ $errors->first('name') }}</h8>
            </div>
        </div>
    </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-sm']) !!}
    {{Form::close()}}
    @if($subject->id)
        {{ Form::model($subject, array('route' => ['subjects.destroy', $subject->id], 'method' => 'DELETE'))}}
        {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"])}}
        {{ Form::close() }}
    @endif
@endsection
