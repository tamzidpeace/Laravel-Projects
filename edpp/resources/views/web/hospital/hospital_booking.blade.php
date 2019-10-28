@extends('layouts.app')

@section('content')

<div class="hospital-profile">
    <br>
    <h1> Hospital Booking </h1>
</div>


<div class="row">

    <div class="col-md-offset-2 col-md-8">

        <div class="sidebar">
            <div class="panel panel-default">
                <div class="panel-heading" id="sidebar-title">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Hospital Booking Form</h3>
                </div>

                <div class="panel-body">
                    <h3>Book Hospital Seat</h3>

                    {!! Form::open(['method' => 'post', 'action' =>
                    ['HospitalBookingController@bookHosSeat']])
                    !!}

                    <div class="form-group">
                        {!! Form::label('department', 'Department') !!}
                        {!! Form::text('dept', $department->department_name,
                        ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('seat', 'Seat') !!}
                        {!! Form::text('seat', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('date', 'Date') !!}
                        {!! Form::text('date', null, ['class' => 'form-control', 'readonly' => 'true']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pname', 'Patient Name') !!}
                        {!! Form::text('pname', $patient->name, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pphone', 'Patient Phone') !!}
                        {!! Form::number('pphone', $patient->phone, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('pemail', 'Patient Email') !!}
                        {!! Form::email('pemail', $patient->email, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('paddress', 'Patient Address') !!}
                        {!! Form::text('paddress', $patient->address, ['class' => 'form-control']) !!}
                    </div>

                    {{ Form::hidden('hospital_id', $id) }}
                    {{ Form::hidden('dept_id', $department->id) }}

                    <div class="form-group feedback-btn">
                        {!! Form::submit('Book Now', ['class' => 'btn btn-primary btn-block']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>




@endsection