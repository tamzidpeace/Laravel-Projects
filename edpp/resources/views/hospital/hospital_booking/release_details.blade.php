@extends('layouts.hospital')

@section('content')

<h1>Hospital Released Details</h1>

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-heading"><strong>Release Details</strong></div>
            <div class="panel-body">

                @php
                $ap = $hb;
                @endphp

                <p> Appointment ID: {{$ap->id}} </p>
                <p> Hospital/Chamber: {{$ap->hospital->name}} </p>
                <p>Seat: {{$ap->seat}} </p>
                <p> Patient: {{$ap->patient->name}} </p>
                <p> Contact No: {{$ap->hospital->phone}} </p>
                <p> Admin Date: {{$cost->admit_date}} </p>
                <p> Release Date {{$cost->release_date}}</p>
                <p><strong>Costs</strong></p>
                <p>Seat Cost: {{$cost->seat}}</p>
                <p>Medicine Cost: {{$cost->medicine}}</p>
                <p>Test Cost: {{$cost->test}}</p>
                <p>Operation Cost: {{$cost->operation}}</p>
                <p>Others Cost: {{$cost->others}}</p>
                <p>Total Cost: {{$cost->total}}</p>

                <button class="btn btn-info" type="submit">Downloads</button>


                {{-- {!! Form::open(['action' => ['DoctorAppointment@appointmentPrescribe', $ap->id], 'method' =>'get'])
                !!}

                <div class="form-group">
                    {!! Form::submit('Prescribe', ['class' => 'btn btn-info btn-block']) !!}
                </div>

                {!! Form::close() !!} --}}


            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>

@endsection