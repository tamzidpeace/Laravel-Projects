@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    <div class="row">

        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=""
                 class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">

            {!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files'=> true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Status') !!}
                {!! Form::select('is_active', array(1=>'Active', 0=>'Inactive'), null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group-lg" style="padding: 5px">
                {!!  Form::submit('Create User', ['class' => 'btn btn-primary btn-block']) !!}
            </div>

            <div style="padding: 5px;">
                {!! Form::close() !!}

                {!! Form::open(['action' => ['AdminUsersController@destroy', $user->id], 'method' => 'delete']) !!}


                <div class="form-group">
                    {!!  Form::submit('Delete User', ['class' => 'btn btn-danger btn-block']) !!}
                </div>

                {!! Form::close() !!}
            </div>


        </div>

    </div>
    <div class="row">
        @include('includes.form_errors')
    </div>


@stop