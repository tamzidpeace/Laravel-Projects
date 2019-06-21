@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1 style="text-align:center;">Doctor Registration</h1>
        <div class="col-md-8 col-md-offset-2">
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Registration Form</h3>
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'POST', 'action' => 'DoctorController@store', 'files'=> true]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('specialist', 'Specialist') !!}
                            {!! Form::select('specialist', ['' => 'Choose Option'] + $specialists, null, ['class' =>
                            'form-control'])
                            !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('degree', 'Degree') !!}
                            {!! Form::text('degree', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('gender', 'Gender') !!}
                            {!! Form::select('gender', ['' => 'Choose Option'] + $genders, null, ['class' =>
                            'form-control']) !!}
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

                        <div class='form-group'>
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
</div>

@endsection