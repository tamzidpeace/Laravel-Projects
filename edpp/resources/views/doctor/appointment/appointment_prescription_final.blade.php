@extends('layouts.doctor')

@section('content')

{!! Form::open(['action' => ['DoctorAppointment@completeAppointment', $id], 'method' =>'get']) !!}


{!! Form::submit('Print Prescription', ['class' => 'form-control btn-primary btn-lg']) !!} <br> <br>

{!! Form::close() !!}

<a href="/doctor/appointments/booked"><button type="button" class="btn btn-block btn-success btn-lg">End</button></a>

@endsection