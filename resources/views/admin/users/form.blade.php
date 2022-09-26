@extends('admin.admin-master')
@section('title',  __('welcome.act-create').' '.__('welcome.user'))
@section('content-title', __('welcome.act-create').' '.__('welcome.user'))
@section('content')
     @if($user->id)
         {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
     @else
         {!! Form::model($user, ['method' => 'POST','route' => ['users.store']]) !!}
     @endif
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>@lang('welcome.col-name')</strong>
                 {!! Form::text('name', null, array('placeholder' => __('welcome.col-name'),'class' => 'form-control')) !!}
             </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>@lang('welcome.col-email')</strong>
                 {!! Form::text('email', null, array('placeholder' => __('welcome.col-email'),'class' => 'form-control')) !!}
             </div>
         </div>
{{--         @if($user->id)--}}
{{--         @else--}}
{{--             <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                 <div class="form-group">--}}
{{--                     <strong>Password:</strong>--}}
{{--                     {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}--}}
{{--                 </div>--}}
{{--             </div>--}}
{{--             <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--                 <div class="form-group">--}}
{{--                     <strong>Confirm Password:</strong>--}}
{{--                     {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}--}}
{{--                 </div>--}}
{{--             </div>--}}
{{--         @endif--}}
{{--         <div class="col-xs-12 col-sm-12 col-md-12">--}}
{{--             <div class="form-group">--}}
{{--                 <strong>Role:</strong>--}}
{{--                 {{ Form::select('roles', $roles, $userRole, ['class' => 'form-control']) }}--}}
{{--             </div>--}}
{{--         </div>--}}
         @if($user->id)

         @else
             <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>@lang('welcome.faculty')</strong>
                 {{ Form::select('faculty_id', $faculty, '', ['class' => 'form-control']) }}
             </div>
         </div>
         @endif
         <div class="col-xs-12 m-1">
             <button type="submit" class="btn btn-primary">Submit</button>
         </div>
     </div>
     {!! Form::close() !!}
@endsection
