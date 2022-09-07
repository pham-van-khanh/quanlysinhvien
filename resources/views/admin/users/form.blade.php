@extends('admin.admin-master')
@section('title', 'Users')
@section('content-title', 'Users')
@section('content')
     @if($user->id)
         {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
     @else
         {!! Form::model($user, ['method' => 'POST','route' => ['users.store']]) !!}
     @endif
     <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>Name:</strong>
                 {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
             </div>
         </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
             <div class="form-group">
                 <strong>Email:</strong>
                 {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
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
                 <strong>Faculty:</strong>
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
