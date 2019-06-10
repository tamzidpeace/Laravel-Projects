@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Registered Patients</h1>

        <div class="col-md-8">
            <table class="table">
                <tr class="info">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Block</th>
                </tr>

                @foreach ($patients as $patient)

                <tr class="warning">
                    <td><a href="/admin/patient/{{$patient->id}}/details">{{$patient->name}}</a></td>
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
</div>

@endsection