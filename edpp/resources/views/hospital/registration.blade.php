@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <h1 style="text-align:center;">Hospital Registration</h1>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">

                <div class="panel-heading" id="sidebar-title">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Registration Form</h3>
                </div>

                <div class="panel-body">
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
        </div>

    </div>
</div>

@endsection