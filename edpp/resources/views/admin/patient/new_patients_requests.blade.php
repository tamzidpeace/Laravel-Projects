@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>New Patients Requests</h1>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Accept</th>
                <th>Reject</th>
            </tr>

            @foreach ($patients as $patient)

            <tr>
                <td>{{$patient->name}}</td>
                <td>{{$patient->phone}}</td>
                <td>
                    {{-- accept button --}}
                    {!! Form::open(['action' => ['AdminPatientController@accept', $patient->id], 'method' =>'patch'])
                    !!}
                
                    <div class="form-group">
                        {!! Form::submit('Accept Request', ['class' => 'btn btn-primary']) !!}
                    </div>
                
                    {!! Form::close() !!}
                </td>
                
                {{-- reject button --}}
                <td>
                    {!! Form::open(['action' => ['AdminPatientController@rejectOrRemove', $patient->id], 'method'
                    =>'delete']) !!}
                
                    <div class="form-group">
                        {!! Form::submit('Reject it', ['class' => 'btn btn-danger']) !!}
                    </div>
                
                    {!! Form::close() !!}
                
                </td>
            </tr>

            @endforeach
        </table>

    </div>
</div>

@endsection