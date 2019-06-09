@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <h1>Doctor Registration</h1>

        <br>

        {!! Form::open(['method' => 'POST', 'action' => 'DoctorController@store', 'files'=> true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('specialist', 'Specialist') !!}
            {!! Form::select('specialist', ['' => 'Choose Option'] + $specialists, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email' , $user->email, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Contact Number') !!}
            {!! Form::number('phone' , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address' , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role', 'Registering as: Doctor') !!}

        </div>

        <div class="form-group">
            {!! Form::label('photo', 'Photo') !!}
            {!! Form::file('photo' , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Proceed', ['class' => 'btn btn-primary btn-block']) !!}
        </div>

        {!! Form::close() !!}

    </div>
</div>

@endsection