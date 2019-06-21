@extends('layouts.doctor')


@section('content')
<h2>All Working States</h2>

<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive">

            <tr class="info">
                <th>#</th>
                <th>Action</th>
                <th>Hospital</th>
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
                {{-- edit button --}}
                <td>
                    {!! Form::open(['action' => ['DoctorController@editWorkingState', $ws->id], 'method' => 'get']) !!}

                    {!! Form::submit('EDIT', ['class' => 'form-control btn-info']) !!}

                    {!! Form::close() !!}
                </td>
                {{-- end of edit button --}}
                <td> {{$ws->hospital->name}} </td>
                <td> {{$ws->day->name}} </td>
                <td> {{$ws->payment}} </td>
                <td> {{$ws->morning}} </td>
                <td> {{$ws->m_status}} </td>
                <td> {{$ws->m_visit_amount}} </td>
                <td> {{$ws->m_visit_amount_b}} </td>
                <td> {{$ws->afternoon}} </td>
                <td> {{$ws->a_status}} </td>
                <td> {{$ws->a_visit_amount}} </td>
                <td> {{$ws->a_visit_amount_b}} </td>
                <td> {{$ws->evening}} </td>
                <td> {{$ws->e_status}} </td>
                <td> {{$ws->e_visit_amount}} </td>
                <td> {{$ws->e_visit_amount_b}} </td>
            </tr>

            @endforeach

        </table>
    </div>
</div>


@endsection