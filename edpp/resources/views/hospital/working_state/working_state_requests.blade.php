@extends('layouts.hospital')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h3>Morning Active Working State Requests</h3>
        <table class="table table-bordered">
            <tr class="info">
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'morning';
            @endphp

            @foreach ($morning_active_requests as $ma)
            <tr>
                <td> {{$ma->doctor->name}} </td>
                <td> {{$ma->day->name}} </td>
                <td> {{$ma->morning}} </td>
                <td> {{$ma->m_status}} </td>
                <td>

                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateActive', $ma->id, $state],
                    'method' =>
                    'patch']) !!}

                    {!! Form::submit('Accept', ['class' => 'form-control btn-success']) !!}

                    {!! Form::close() !!}

                </td>
                <td>

                </td>
            </tr>

            @endforeach

        </table>

        <h3>Morning Inactive Working State Requests</h3>
        <table class="table table-bordered">
            <tr class="info">
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'morning';
            @endphp

            @foreach ($morning_inactive_requests as $ma)
            <tr>
                <td> {{$ma->doctor->name}} </td>
                <td> {{$ma->day->name}} </td>
                <td> {{$ma->morning}} </td>
                <td> {{$ma->m_status}} </td>
                <td>

                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateInactive', $ma->id, $state],
                    'method' =>
                    'patch']) !!}

                    {!! Form::submit('Accept', ['class' => 'form-control btn-success']) !!}

                    {!! Form::close() !!}

                </td>
                <td>

                </td>
            </tr>

            @endforeach

        </table>

    </div>
</div>

{{-- afternoon --}}
<div class="row">
    <div class="col-md-10">
        <h3>Afternoon Active Working State Requests</h3>
        <table class="table table-bordered">
            <tr class="info">
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'afternoon';
            @endphp

            @foreach ($afternoon_active_requests as $aa)
            <tr>
                <td> {{$aa->doctor->name}} </td>
                <td> {{$aa->day->name}} </td>
                <td> {{$aa->afternoon}} </td>
                <td> {{$aa->a_status}} </td>
                {{-- accept button --}}
                <td>
                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateActive', $aa->id, $state],
                    'method' =>
                    'patch']) !!}

                    {!! Form::submit('Accept', ['class' => 'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </td>
                <td>

                </td>

            </tr>

            @endforeach

        </table>

        <h3>Afternoon Inactive Working State Requests</h3>
        <table class="table table-bordered">
            <tr class="info">
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'afternoon';
            @endphp

            @foreach ($afternoon_inactive_requests as $aa)
            <tr>
                <td> {{$aa->doctor->name}} </td>
                <td> {{$aa->day->name}} </td>
                <td> {{$aa->afternoon}} </td>
                <td> {{$aa->a_status}} </td>
                {{-- inactive button --}}
                <td>
                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateInactive', $aa->id, $state],
                    'method' =>
                    'patch']) !!}

                    {!! Form::submit('Accept', ['class' => 'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </td>
                <td>

                </td>

            </tr>

            @endforeach

        </table>
    </div>
</div>

{{-- evening --}}
<div class="row">
    <div class="col-md-10">
        <h3>Evening Active Working State Requests</h3>
        <table class="table table-bordered">
            <tr class="info">
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
                <th>Action</th>
            </tr>

            @php
            $state = 'evening';
            @endphp

            @foreach ($evening_active_requests as $ea)
            <tr>
                <td> {{$ea->doctor->name}} </td>
                <td> {{$ea->day->name}} </td>
                <td> {{$ea->evening}} </td>
                <td> {{$ea->e_status}} </td>
                <td>
                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateActive', $ea->id, $state],
                    'method' =>
                    'patch']) !!}

                    {!! Form::submit('Accept', ['class' => 'form-control btn-success']) !!}

                    {!! Form::close() !!}
                </td>
                <td>

                </td>
            </tr>

            @endforeach

        </table>

        <h3>Evening Inactive Working State Requests</h3>
        <table class="table table-bordered">
            <tr class="info">
                <th>Doctor</th>
                <th>Day</th>
                <th>Time</th>
                <th>Current Status</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        
            @php
            $state = 'evening';
            @endphp
        
            @foreach ($evening_inactive_requests as $ea)
            <tr>
                <td> {{$ea->doctor->name}} </td>
                <td> {{$ea->day->name}} </td>
                <td> {{$ea->evening}} </td>
                <td> {{$ea->e_status}} </td>
                <td>
                    {!! Form::open(['action' => ['HospitalDoctorWorkingStateController@stateInactive', $ea->id, $state],
                    'method' =>
                    'patch']) !!}
        
                    {!! Form::submit('Accept', ['class' => 'form-control btn-success']) !!}
        
                    {!! Form::close() !!}
                </td>
                <td>
        
                </td>
            </tr>
        
            @endforeach
        
        </table>
    </div>
</div>

@endsection