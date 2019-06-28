@extends('layouts.hospital')


@section('content')
<h2>Hospital Doctor Working States</h2>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive">

            <tr class="info">
                <th>Serial</th>
                <th>Doctor</th>
                <th>Day</th>
                <th>Appointment Cost</th>
                <th>Morning</th>
                <th>Status</th>
                <th>Max Appointment</th>
                <th>Booked</th>
                <th>Afternoon</th>
                <th>Status</th>
                <th>Max Appointment</th>
                <th>Booked</th>
                <th>Evening</th>
                <th>Status</th>
                <th>Max Appointment</th>
                <th>Booked</th>

            </tr>

            @php
            $serial = 1;
            @endphp

            @foreach ($working_states as $ws)
            <tr>
                <td> {{$serial++}} </td>
                <td> {{$ws->doctor->name}} </td>
                <td> {{$ws->day->name}} </td>
                <td> {{$ws->payment}} </td>
                <td> {{$ws->morning}} </td>
                <td class="info"> {{$ws->m_status}} </td>
                <td> {{$ws->m_visit_amount}} </td>
                <td> {{$ws->m_visit_amount_b}} </td>
                <td> {{$ws->afternoon}} </td>
                <td class="info"> {{$ws->a_status}} </td>
                <td> {{$ws->a_visit_amount}} </td>
                <td> {{$ws->a_visit_amount_b}} </td>
                <td> {{$ws->evening}} </td>
                <td class="info"> {{$ws->e_status}} </td>
                <td> {{$ws->e_visit_amount}} </td>
                <td> {{$ws->e_visit_amount_b}} </td>
            </tr>

            @endforeach

        </table>
    </div>
</div>

@endsection