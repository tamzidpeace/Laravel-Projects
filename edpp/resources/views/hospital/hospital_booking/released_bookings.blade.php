@extends('layouts.hospital')

@section('content')
<h1>Hospital Released Booking </h1>



<div class="row">
    <div class="col-md-12">

        <table class="table table-bordered">
            <tr class="info">
                <th>Serial</th>
                <th>Booking ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Emal</th>
                <th>Address</th>
                <th>Seat</th>
                <th>Date</th>
                <th>Department</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @php
            $serial = 1;
            @endphp

            @foreach ($released_bookings as $cs)

            <tr>
                <td> {{$serial++}} </td>
                <td> {{$cs->id}} </td>
                <td> {{$cs->patient_name}} </td>
                <td>{{$cs->patient_phone}} </td>
                <td> {{$cs->patient_email}}</td>
                <td> {{$cs->patient_address}}</td>
                <td> {{$cs->seat}}</td>
                <td> {{$cs->date}}</td>
                <td> {{$cs->department->department_name}}</td>
                <td> {{$cs->status}}</td>
                <td>
                    {!! Form::open(['action' => ['HospitalBookingController@releaseDetails', $cs->id],
                    'method' => 'get']) !!}

                    {!! Form::submit('Details', ['class' => 'form-control btn-info btn-block']) !!}

                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach


        </table>

    </div>
</div>




@endsection