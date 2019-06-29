@extends('layouts.hospital')

@section('content')

<h2>Inactive Working States</h2>

<div class="row">
    <div class="col-md-10">
        <h3>Morning Inactives States</h3>
        <table class="table table-bordered">
            <tr>
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'morning';
            @endphp

            @foreach ($morning_inactives as $mi)
            <tr>
                <td> {{$mi->doctor->name}} </td>
                <td> {{$mi->day->name}} </td>
                <td> {{$mi->morning}} </td>
                <td> {{$mi->m_status}} </td>
                <td>

                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateActive', $mi->id, $state],
                    'method' =>
                    'patch']) !!}

                    {!! Form::submit('Active', ['class' => 'form-control btn-success']) !!}

                    {!! Form::close() !!}

                </td>
            </tr>

            @endforeach

        </table>
    </div>
</div>

{{-- afternoon --}}
<div class="row">
    <div class="col-md-10">
        <h3>Afternoon Inactives States</h3>
        <table class="table table-bordered">
            <tr>
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'afternoon';
            @endphp

            @foreach ($afternoon_inactives as $ai)
            <tr>
                <td> {{$ai->doctor->name}} </td>
                <td> {{$ai->day->name}} </td>
                <td> {{$ai->afternoon}} </td>
                <td> {{$ai->a_status}} </td>
                <td>
                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateActive', $ai->id, $state],
                    'method' =>
                    'patch']) !!}

                    {!! Form::submit('Active', ['class' => 'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach

        </table>
    </div>
</div>

{{-- evening --}}
<div class="row">
    <div class="col-md-10">
        <h3>Evening Inactives States</h3>
        <table class="table table-bordered">
            <tr>
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'evening';
            @endphp

            @foreach ($evening_inactives as $ei)
            <tr>
                <td> {{$ei->doctor->name}} </td>
                <td> {{$ei->day->name}} </td>
                <td> {{$ei->evening}} </td>
                <td> {{$ei->e_status}} </td>
                <td>
                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateActive', $ei->id, $state],
                    'method' =>
                    'patch']) !!}

                    {!! Form::submit('Active', ['class' => 'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach

        </table>
    </div>
</div>

@endsection