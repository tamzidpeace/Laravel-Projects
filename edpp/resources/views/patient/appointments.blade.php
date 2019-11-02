@extends('layouts.app')


@section('content')

<h2 style="text-align:center;"><strong>Your Appointments</strong></h2>

{{-- pending appointments --}}
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="specialist">
                <div class="panel panel-info">
                    <div class="panel-heading" id="specialist-panel-heading">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Pending Appointments</h3>
                    </div>
                    <div class="panel-body">

                        @if (count($appointments_pending) <= 0) <div class="alert alert-info alert-dismissible"
                            role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h3> Currently No Appointment is Pending! </h3>

                    </div>

                    @else

                    <h4 style="text-align:center"> <strong> Appointment Details </strong> </h4>
                    @foreach ($appointments_pending as $ap)

                    <div style="text-align: center;
                    margin: 10px;
                    background-color: #d9edf7;
                    border-radius: 4px;" class="apt-details">
                        <p> <strong>Appointment ID: {{$ap->id}}</strong> </p>
                        <p> <strong>Doctor: {{$ap->doctor->name}}</strong> </p>
                        <p> <strong>Hospital: {{$ap->hospital->name}}</strong> </p>
                        <p> <strong>Hospital Address: {{$ap->hospital->address}}</strong> </p>
                        <p> <strong>Hospital Phone: {{$ap->hospital->phone}}</strong> </p>
                        <p> <strong>Date: {{$ap->date}}</strong> </p>

                        {!! Form::open(['action' => ['DoctorAppointment@cancelRequest', $ap->id], 'method' =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Cancel Appointment', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>

                    @endforeach

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

{{-- end of pending appointments --}}

{{-- booked appointments --}}
<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="specialist">
                <div class="panel panel-info">
                    <div class="panel-heading" id="specialist-panel-heading">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Booked Appointments</h3>
                    </div>
                    <div class="panel-body">

                        @if (count($appointments) <= 0) <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h3> Currently No Appointment Booked! </h3>

                    </div>

                    @else

                    <h4 style="text-align:center"> <strong> Appointment Details </strong> </h4>
                    @foreach ($appointments as $ap)

                    <div style="text-align: center;
                    margin: 10px;
                    background-color: #d9edf7;
                    border-radius: 4px;" class="apt-details">
                        <p> <strong>Appointment ID: {{$ap->id}}</strong> </p>
                        <p> <strong>Doctor: {{$ap->doctor->name}}</strong> </p>
                        <p> <strong>Hospital: {{$ap->hospital->name}}</strong> </p>
                        <p> <strong>Hospital Address: {{$ap->hospital->address}}</strong> </p>
                        <p> <strong>Hospital Phone: {{$ap->hospital->phone}}</strong> </p>
                        <p> <strong>Date: {{$ap->date}}</strong> </p>

                        {!! Form::open(['action' => ['DoctorAppointment@cancelRequest', $ap->id], 'method' =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Cancel Appointment', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>

                    @endforeach

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

{{-- previous appointments --}}

<div class="container">
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="specialist">
                <div class="panel panel-info">
                    <div class="panel-heading" id="specialist-panel-heading">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Previous Appointments</h3>
                    </div>
                    <div class="panel-body">

                        @if (count($appointmentsP) <= 0) <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h3> You haven't anyprevious appointment yet! </h3>

                    </div>

                    @else

                    <h4 style="text-align:center"> <strong> Appointment Details </strong> </h4>
                    @foreach ($appointmentsP as $ap)

                    <div style="text-align: center;
                    margin: 10px;
                    background-color: #d9edf7;
                    border-radius: 4px;" class="apt-details">
                        <p> <strong>Appointment ID: {{$ap->id}}</strong> </p>
                        <p> <strong>Doctor: {{$ap->doctor->name}}</strong> </p>
                        <p> <strong>Hospital: {{$ap->hospital->name}}</strong> </p>
                        <p> <strong>Hospital Address: {{$ap->hospital->address}}</strong> </p>
                        <p> <strong>Hospital Phone: {{$ap->hospital->phone}}</strong> </p>
                        <p> <strong>Date: {{$ap->date}}</strong> </p>
                        <p> <strong>Prescription:</strong>
                            {!! Form::open(['action' => ['DoctorAppointment@completeAppointment', $ap->id], 'method'
                            =>'get']) !!}

                            <div class="col-sm-offset-4 col-sm-4">
                                {!! Form::submit('Download Prescription', ['class' => 'form-control btn-primary']) !!}
                                <br> <br>
                            </div>


                            {!! Form::close() !!}

                        </p>
                    </div>

                    @endforeach

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>




@endsection