@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-offset-1 col-md-10">
        <h2><strong>Appointment Available, Confirm it.</strong></h2>
        <div class="appointment-booking">
            <div class="panel panel-default">
                <div class="panel-heading" id="sidebar-title">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Appointment Booking Information</h3>
                </div>
                <div class="panel-body">

                    <!-- appointment form -->

                    <div class="panel-body">


                        {!! Form::open(['action' => ['PatientController@bookAppointment'], 'method'
                        => 'post']) !!}

                        <input type="hidden" name="booking" value="{{$booking}}">
                        <input type="hidden" name="ws" value="{{$ab->id}}">
                        <input type="hidden" name="period" value="{{$pd}}">
                        <input type="hidden" name="date" value="{{$dt}}">

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', $patient->name, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('age', 'Age') !!}
                            {!! Form::text('age', $patient->age, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('sex', 'Gender') !!}
                            {!! Form::text('sex', $patient->gender->name, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('blood_group', 'Blood Group') !!}
                            {!! Form::text('blood_group', $patient->bloodGroup->name, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Phone') !!}
                            {!! Form::text('phone', $patient->phone, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email', $patient->email, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('doctor', 'Doctor : ' . $doctor->name) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('hospital', 'Hospital : ' . $hospital->name) !!}

                        </div>

                        <div class="form-group">
                            {!! Form::label('m_period', 'Period') !!}
                            {!! Form::text('m_period', $pd, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('m_day', 'Day') !!}
                            {!! Form::text('m_day', $da, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('m_date', 'Date') !!}
                            {!! Form::text('m_date', $dt, ['class' => 'form-control', 'disabled' => 'disabled']) !!}
                        </div>



                        {!! Form::submit('Confirm Appointment', ['class' => 'form-control btn-primary']) !!}

                        {!! Form::close() !!}



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection