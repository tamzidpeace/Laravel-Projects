@extends('layouts.hospital')

@section('content')

<h2>Active Working States</h2>

<div class="row">
    <div class="col-md-10">
        <h3>Morning Actives States</h3>
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

            @foreach ($morning_actives as $ma)
            <tr>
                <td> {{$ma->doctor->name}} </td>
                <td> {{$ma->day->name}} </td>
                <td> {{$ma->morning}} </td>
                <td> {{$ma->m_status}} </td>
                <td>

                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateInactive', $ma->id, $state], 'method' =>
                    'patch']) !!}

                    {!! Form::submit('Inactive', ['class' => 'form-control btn-danger']) !!}

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
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'afternoon';
            @endphp

            @foreach ($afternoon_actives as $aa)
            <tr>
                <td> {{$aa->doctor->name}} </td>
                <td> {{$aa->day->name}} </td>
                <td> {{$aa->afternoon}} </td>
                <td> {{$aa->a_status}} </td>
                {{-- inactive button --}}
                <td>
                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateInactive', $aa->id, $state], 'method' =>
                    'patch']) !!}

                    {!! Form::submit('Inactive', ['class' => 'form-control btn-danger']) !!}

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
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'evening';
            @endphp

            @foreach ($evening_actives as $ea)
            <tr>
                <td> {{$ea->doctor->name}} </td>
                <td> {{$ea->day->name}} </td>
                <td> {{$ea->evening}} </td>
                <td> {{$ea->e_status}} </td>
                <td>
                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateInactive', $ea->id, $state], 'method' =>
                    'patch']) !!}

                    {!! Form::submit('Inactive', ['class' => 'form-control btn-danger']) !!}

                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach

        </table>
    </div>
</div>

@endsection