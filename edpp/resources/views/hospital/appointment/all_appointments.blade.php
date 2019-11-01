@extends('layouts.hospital')


@section('content')

<h2><strong>All Appointments</strong></h2>

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
    </tr>

    @foreach ($appointments as $pa)
    <tr>
        <td> {{$pa->id}} </td>
        <td> {{$pa->doctor->name}} </td>
        <td> {{$pa->patient_name}} </td>
        <td> {{$pa->patient_email}} </td>
        <td> {{$pa->patient_phone}} </td>
        <td> {{$pa->date}} </td>
        <td> {{$pa->period}} </td>
        <td> {{$pa->status}} </td>
    </tr>
    @endforeach

</table>

@endsection