@extends('layouts.hospital')

@section('content')
<h1>Hospital Booking Requests</h1>



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

            @foreach ($hs_bookings as $hs)

            <tr>
                <td> {{$serial++}} </td>
                <td> {{$hs->id}} </td>
                <td> {{$hs->patient_name}} </td>
                <td>{{$hs->patient_phone}} </td>
                <td> {{$hs->patient_email}}</td>
                <td> {{$hs->patient_address}}</td>
                <td> {{$hs->seat}}</td>
                <td> {{$hs->date}}</td>
                <td> {{$hs->department->department_name}}</td>
                <td> {{$hs->status}}</td>
                <td>
                    {!! Form::open(['action' => ['HospitalBookingController@acceptBookingRequest', $hs->id],
                    'method' => 'patch']) !!}

                    {!! Form::submit('Accept', ['class' => 'form-control btn-success btn-block']) !!}

                    {!! Form::close() !!}
                </td>

                <td>
                    {!! Form::open(['action' => ['HospitalBookingController@rejectBookingRequest', $hs->id],
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