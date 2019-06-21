@extends('layouts.doctor')

@section('content')

<h2>Inactive Working States</h2>

<div class="row">
    <div class="col-md-10">
        <h3>Morning Actives States</h3>
        <table class="table table-bordered">
            <tr>
                <th>Hospital</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'morning';
            @endphp

            @foreach ($morning_inactives as $mi)
            <tr>
                <td> {{$mi->hospital->name}} </td>
                <td> {{$mi->morning}} </td>
                <td> {{$mi->m_status}} </td>
                <td>

                    {!! Form::open(['action' => ['DoctorController@stateActive', $mi->id, $state], 'method' =>
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
        <h3>Afternoon Actives States</h3>
        <table class="table table-bordered">
            <tr>
                <th>Hospital</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'afternoon';
            @endphp

            @foreach ($afternoon_inactives as $ai)
            <tr>
                <td> {{$ai->hospital->name}} </td>
                <td> {{$ai->afternoon}} </td>
                <td> {{$ai->a_status}} </td>
                <td>
                    {!! Form::open(['action' => ['DoctorController@stateActive', $ai->id, $state], 'method' =>
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
        <h3>Evening Actives States</h3>
        <table class="table table-bordered">
            <tr>
                <th>Hospital</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'evening';
            @endphp

            @foreach ($evening_inactives as $ei)
            <tr>
                <td> {{$ei->hospital->name}} </td>
                <td> {{$ei->evening}} </td>
                <td> {{$ei->e_status}} </td>
                <td>
                    {!! Form::open(['action' => ['DoctorController@stateActive', $ei->id, $state], 'method' =>
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