@extends('layouts.hospital')

@section('content')
<h1>Pending Requests</h1>

<div class="container">
    <div class="row">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Accept</th>
                <th>Reject</th>
            </tr>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{$doctor->name}}
                <td>{{$doctor->phone}}</td>
                <td>
                    {{-- accept button --}}
                    {!! Form::open(['action' => ['HospitalController@accept', $doctor->id], 'method' =>'patch'])
                    !!}
                    
                    <div class="form-group">
                        {!! Form::submit('Accept Request', ['class' => 'btn btn-success']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </td>
                <td>
                    {{-- reject button --}}
                    {!! Form::open(['action' => ['HospitalController@reject', $doctor->id], 'method' =>'delete'])
                    !!}
                    
                    <div class="form-group">
                        {!! Form::submit('Reject Request', ['class' => 'btn btn-danger']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</div>

@endsection