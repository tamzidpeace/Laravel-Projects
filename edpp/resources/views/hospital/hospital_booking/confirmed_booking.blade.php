@extends('layouts.hospital')

@section('content')
<h1>Hospital Confirmed Booking </h1>



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
                <th>Action</th>
            </tr>

            @php
            $serial = 1;
            @endphp

            @foreach ($confirmed_bookings as $cs)

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
                    {!! Form::open(['action' => ['HospitalBookingController@confirmBookingRequest', $cs->id],
                    'method' => 'patch']) !!}

                    {!! Form::submit('Admit', ['class' => 'form-control btn-success btn-block']) !!}

                    {!! Form::close() !!}
                </td>

                <td>
                    {!! Form::open(['action' => ['HospitalBookingController@rejectConfirmedBooking', $cs->id],
                    'method' => 'delete']) !!}

                    {!! Form::submit('Reject', ['class' => 'form-control btn-danger btn-block']) !!}

                    {!! Form::close() !!}
                </td>

            </tr>

            @endforeach


        </table>

    </div>
</div>




@endsection