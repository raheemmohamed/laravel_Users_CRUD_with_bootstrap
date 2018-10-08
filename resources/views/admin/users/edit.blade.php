@extends('layouts.admin')

@section('title')
    Edit Users
@endsection


@section('content')
    <!-- this is session alert user success message -->
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif



    <div class="col-md-3 col-sm-3 col-lg-3">
        <img height="140px" src="{{$users->photo_id ? $users->photo->file : "https://via.placeholder.com/220x150" }}">
    </div>

    <div class="col-md-9 col-sm-9 col-lg-9">

        {!! Form::model($users, ['method'=>'PATCH', 'url'=>['/updateUserForm/'.$users->id], 'action' =>['AdminUserController@update',$users->id], 'enctype'=>'multipart/form-data'] ) !!}

        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">

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
        {!! Form::label('photo_id', 'upload image file')!!}
        <!--Text area build like this-->
            {!! Form:: file('photo_id', ['class' => 'form-control']);  !!}
        </div>

        <div class="form-group">
            <!-- label build like this with package-->
        {!! Form::label('role_id', 'Select Role')!!}
        <!--Text area build like this-->
            {!! Form::select('role_id', $role , null,['class'=>'form-control']) !!}

        </div>

        <div class="form-group">
            <!-- label build like this with package-->
        {!! Form::label('active_ids', 'Select active')!!}
        <!--Text area build like this-->
            {!! Form::select('active_id', array(1=>'Active', 0=>'Not Active'), null,['class'=>'form-control']) !!}

        </div>


        <div class="form-group">
            <!-- Form submit using laravel packagist to build html form-->
            {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        
    </div>

    {!! Form::open(['method'=>'DELETE', 'url'=>['/deleteUser/'.$users->id] ,'action'=>'AdminUserController@destroy',$users->id ]) !!}

    <div class="form-group">
        <!-- Form submit using laravel packagist to build html form-->
        {!! Form::submit('delete user', ['class'=>'btn btn-danger']) !!}
    </div>

    {!! Form::close() !!}


@endsection