@extends('layouts.admin')

@section('title')
   Create New Users
@endsection


@section('content')
    <!-- this is session alert user success message -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif


     {!! Form::open(['method'=>'POST','url' => 'createUserForm','enctype'=>'multipart/form-data'] ) !!}

             {{csrf_field()}}
        @include('include.form_error');

         <div class="form-group">
             <!-- label build like this with package-->
             {!! Form::label('name', 'Enter You name')!!}
             {!! Form::text('name', null,['class'=>'form-control'] ) !!}
         </div>

         <div class="form-group">
             <!-- label build like this with package-->
             {!! Form::label('email', 'Enter Email content')!!}
             <!--Text area build like this-->
             {!! Form::email('email', null ,['class'=>'form-control']) !!}
         </div>

        <div class="form-group">
            <!-- label build like this with package-->
            {!! Form::label('password', 'Enter your Passowrd')!!}
            <!--Text area build like this-->
            {!! Form:: password('password', ['class' => 'awesome form-control']);  !!}
        </div>

        <div class="form-group">
            <!-- label build like this with package-->
            {!! Form::label('file', 'upload image file')!!}
          <!--Text area build like this-->
            {!! Form:: file('file', ['class' => 'form-control']);  !!}
        </div>

        <div class="form-group">
            <!-- label build like this with package-->
             {!! Form::label('roletype', 'Select Role')!!}
            <!--Text area build like this-->
            {!! Form::select('roletype', ['' => 'choose role type'] + $role ,null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            <!-- label build like this with package-->
        {!! Form::label('isActive', 'Select active')!!}
        <!--Text area build like this-->
            {!! Form::select('isActive', array(1=>'Active',2=>'Not Active'),null,['class'=>'form-control']) !!}

        </div>


        <div class="form-group">
             <!-- Form submit using laravel packagist to build html form-->
             {!! Form::submit('Create a Post', ['class'=>'btn btn-primary']) !!}
         </div>
         {!! Form::close() !!}

@endsection