@extends('layouts.hospital')

@section('content')

<div class="">

    <h1>Patient Release And Cost Calculation</h1> <br>

    {!! Form::open(['action' => ['HospitalBookingController@releaseAndCostCalculation', $rb->id], 'method' => 'post']) !!}


    <div class="form-group">
        {!! Form::label('id', 'Booking ID: ', ['class' => 'col-sm-2']) !!}
        <div class="col-sm-9">
            {!! Form::text('id', $rb->id, ['class' => 'form-control', 'readonly' => 'true']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('pname', 'Patient', ['class' => 'col-sm-2']) !!}
        <div class="col-sm-9">
            {!! Form::text('pname', $rb->patient_name, ['class' => 'form-control ']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('contact_num', 'Contact Number', ['class' => 'col-sm-2']) !!}
        <div class="col-sm-9">
            {!! Form::text('contact_num', $rb->hospital->phone, ['class' => 'form-control ']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('admit_date', 'Adminted Date', ['class' => 'col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('admit_date', $rb->date, ['class' => 'form-control', 'readonly' => 'true']) !!} <br>
        </div>

    </div>

    <div class="form-group">
        {!! Form::label('release_date', 'Release Date', ['class' => ' col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('release_date', $release_date, ['class' => 'form-control', 'readonly' => 'true']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('seat', 'Seat', ['class' => ' col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('seat', $rb->seat, ['class' => 'form-control', 'readonly' => 'true']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('seat_cost', 'Seat Cost', ['class' => ' col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('seat_cost', $seat_cost, ['class' => 'form-control', 'readonly' => 'true']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('medicine', 'Medicine Cost', ['class' => ' col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('medicine', null, ['class' => 'form-control']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('test', 'Test Cost', ['class' => ' col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('test', null, ['class' => 'form-control']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('operation', 'Operation Cost', ['class' => ' col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('operation', null, ['class' => 'form-control']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('others', 'Others Cost', ['class' => ' col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('others', null, ['class' => 'form-control']) !!} <br>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('total', 'Total Cost', ['class' => ' col-sm-2 col-form-label']) !!}
        <div class="col-sm-9">
            {!! Form::text('total', null, ['class' => 'form-control']) !!} <br>
        </div>
    </div>

    <div class="form-group col-sm-offset-8 col-sm-3 ">
        {!! Form::submit('Release', ['class' => 'form-control btn-success']) !!}
    </div>

    {!! Form::close() !!}



</div>

@endsection