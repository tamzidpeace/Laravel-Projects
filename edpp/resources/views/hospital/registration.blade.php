@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1>Hospital Registration</h1>

        {!! Form::open(['method' => 'POST', 'action' => 'HospitalController@store', 'files'=> true]) !!}
        
        <div class="form-group">
            {!! Form::label('name', 'Hospital Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('address', 'Address') !!}
            {!! Form::text('address' , null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email' , $user->email, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Phone') !!}
            {!! Form::number('phone' , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role', 'Requested Role: Hospital') !!}
            
        </div>

        <div class="form-group">
            {!! Form::label('photo', 'Photo') !!}
            {!! Form::file('photo' , null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('about', 'About') !!}
            {!! Form::textarea('about' , null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Proceed', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
        
        
        {!! Form::close() !!}

    </div>
</div>

@endsection

