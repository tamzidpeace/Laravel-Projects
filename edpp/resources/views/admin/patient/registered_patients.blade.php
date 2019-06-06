@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Registered Patients</h1>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Block</th>
            </tr>

            @foreach ($patients as $patient)

            <tr>
                <td>{{$patient->name}}</td>
                <td>{{$patient->phone}}</td>
                <td>
                    {{-- accept button --}}
                    {!! Form::open(['action' => ['AdminPatientController@block', $patient->id], 'method' =>'patch'])
                    !!}
                    
                    <div class="form-group">
                        {!! Form::submit('Block Doctor', ['class' => 'btn btn-warning']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach
        </table>

    </div>
</div>

@endsection