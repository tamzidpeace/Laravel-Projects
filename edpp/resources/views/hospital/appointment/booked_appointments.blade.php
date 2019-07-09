@extends('layouts.hospital')


@section('content')

<h2><strong>Booked Appointments</strong></h2>

<table class="table table-bordered">
    <tr class="info">
        <th>#</th>
        <th>Doctor</th>
        <th>Patient</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Period</th>
        <th>Status</th>
        <th>Action</th>
    </tr>

    @foreach ($booked_appointments as $pa)
    <tr>
        <td> {{$pa->id}} </td>
        <td> {{$pa->doctor->name}} </td>
        <td> {{$pa->patient_name}} </td>
        <td> {{$pa->patient_email}} </td>
        <td> {{$pa->patient_phone}} </td>
        <td> {{$pa->date}} </td>
        <td> {{$pa->period}} </td>
        <td> {{$pa->status}} </td>

        <td>
            {{-- reject button --}}
            {!! Form::open(['action' => ['HospitalController@cancelAppointment', $pa->id], 'method' =>'delete'])
            !!}

            <div class="form-group">
                {!! Form::submit('Cancel', ['class' => 'btn btn-danger']) !!}
            </div>

            {!! Form::close() !!}
        </td>

    </tr>
    @endforeach

</table>

@endsection