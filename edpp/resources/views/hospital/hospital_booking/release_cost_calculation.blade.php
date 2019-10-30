@extends('layouts.hospital')

@section('content')

<div class="col-md-offset-1 col-md-10 col-md-offset-1">
    <h1>Patient Release And Cost Calculation</h1>

    {!! Form::open(['action' => ['HospitalBookingController@releaseAndCostCalculation'], 'method' => 'post']) !!}


    <div class="form-group">
        {!! Form::label('id', 'Booking ID: ', ['class' => ' control-label']) !!}
    </div>

    <div class="form-group">

        {!! Form::label('pname', 'Patient', ['class' => 'control-label']) !!}

        {!! Form::text('pname', null, ['class' => 'form-control ']) !!}

    </div>



    <div class="form-group">
        {!! Form::submit('Release', ['class' => 'form-control btn-success btn-block']) !!}
    </div>

    {!! Form::close() !!}



</div>

@endsection