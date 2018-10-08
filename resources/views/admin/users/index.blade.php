@extends('layouts.admin')

@section('title')
  All users
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table table-hover">
        <thead>
          <tr>
            <th>User Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Active Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        @if($users)
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><img height="50px" src="{{$user->photo_id ? $user->photo->file : "No Images" }}"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->active_id ==1 ? "Active " :"Not Active"}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>

            <td>

                <div class="row">
                    <a href=" {{URL::to('admin/users/edit', $user->id)}}" class="badge label-primary">Edit</a>

                    {!! Form::open(['method'=>'DELETE', 'url'=>['/deleteUser/'.$user->id] ,'action'=>'AdminUserController@destroy',$user->id ]) !!}

                    <div class="form-group">
                        <!-- Form submit using laravel packagist to build html form-->
                        {!! Form::submit('delete user', ['class'=>'btn btn-danger']) !!}
                    </div>

                    {!! Form::close() !!}


                    {{--<a href="{{URL::to('deleteUser', $user->id)}}" class="badge label-danger">delete</a>--}}


                </div>
            </td>

          </tr>
            @endforeach
         @endif

        </tbody>
      </table>
@endsection


