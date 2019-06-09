@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">

        <h1>Patient Registration</h1>

        <br>

        {!! Form::open(['method' => 'POST', 'action' => 'PatientController@store', 'files'=> true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('age', 'Age') !!}
            {!! Form::number('age', 00, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('sex', 'Sex') !!}
            {!! Form::select('sex', ['' => 'Choice Option'] + $genders, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('blood_group', 'Blood Group') !!}
            {!! Form::select('blood_group', ['' => 'Choice Option'] + $blood_groups ,null, ['class' => 'form-control']) !!}
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
            {!! Form::label('role', 'Registering as: Patient') !!}

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