@extends('layouts.doctor')

@section('content')

{!! Form::open(['action' => ['DoctorAppointment@appointmentPrescribeStore', $ap->id], 'method' =>'patch']) !!}

{!! Form::label('id', 'Appointment ID') !!}
{!! Form::text('id', $ap->id, ['class' => 'form-control' ,'disabled' => 'disabled']) !!}

{!! Form::label('date', 'Appointment Date') !!}
{!! Form::text('date', $ap->date, ['class' => 'form-control' ,'disabled' => 'disabled']) !!}

{!! Form::label('hospital', 'Hospital') !!}
{!! Form::text('hospital', $ap->hospital->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

{!! Form::label('doctor', 'Doctor') !!}
{!! Form::text('doctor', $ap->doctor->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

{!! Form::label('patient', 'Patient') !!}
{!! Form::text('patient', $ap->patient->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

{!! Form::label('age', 'Age') !!}
{!! Form::text('age', $ap->patient->age, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

{!! Form::label('bloodGroup', 'Blood Group') !!}
{!! Form::text('bloodGroup', $ap->patient->bloodGroup->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

{!! Form::label('sex', 'Sex') !!}
{!! Form::text('sex', $ap->patient->gender->name, ['class' => 'form-control', 'disabled' => 'disabled']) !!}

{!! Form::label('medicine', 'Medicine') !!}
{!! Form::textarea('medicine', null, ['class' => 'form-control']) !!} <br>

{!! Form::submit('Complete This Appointment', ['class' => 'form-control btn-primary']) !!} <br> <br>

{!! Form::close() !!}

@endsection