@extends('admin.admin-master')
@section('title', 'Faculty')
@section('content-title', ' Faculty')
@section('content')
    @if($faculty->id)
        {{ Form::model($faculty, array('method' => 'PUT', 'route' => ['faculties.update', $faculty->id])) }}
    @else
        {{ Form::model($faculty, ['method' => 'POST', 'route' => 'faculties.store']) }}
    @endif
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                {{ Form::label('name', 'Name Faculty') }}
                {{ Form::text('name', $faculty->name, ['class'=>'form-control']) }}
            </div>
        </div>
    </div>
    {{ Form::submit('Submit', ['class'=>'btn btn-success'] )}}
    {{ Form::close() }}
@endsection
