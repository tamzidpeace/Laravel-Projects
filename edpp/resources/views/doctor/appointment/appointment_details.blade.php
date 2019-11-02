@extends('layouts.doctor')

@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="panel panel-info">
            <div class="panel-heading"><strong>Appointment Details</strong></div>
            <div class="panel-body">

                @php
                $ap = $appointment;
                @endphp

                <p> Appointment ID: {{$ap->id}} </p>
                <p> Hospital/Chamber: {{$ap->hospital->name}} </p>
                <p> Doctor: {{$ap->doctor->name}} </p>
                <p> Patient: {{$ap->patient->name}} </p>
                <p> Contact No: {{$ap->doctor->phone}} </p>
                <p> Age: {{$ap->patient->age}} </p>
                <p> Blood Group: {{$ap->patient->bloodGroup->name}} </p>
                <p> Sex: {{$ap->patient->gender->name}} </p>
                <p> Date: {{$ap->date}} </p>

                @if ($ap->status == 'visited')

                <button type="submit">View Prescribetion</button>

                @endif

                @if ($ap->status == 'booked')

                {!! Form::open(['action' => ['DoctorAppointment@appointmentPrescribe', $ap->id], 'method' =>'get'])
                !!}

                <div class="form-group">
                    {!! Form::submit('Prescribe', ['class' => 'btn btn-info btn-block']) !!}
                </div>

                {!! Form::close() !!}

                @endif

            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>




@endsection