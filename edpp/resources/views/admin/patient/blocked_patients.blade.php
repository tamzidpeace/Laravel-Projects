@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Blocked Patients</h1>

        <div class="col-md-8">
            <table class="table">
                <tr class="info">
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>

                @foreach ($patients as $patient)

                <tr class="warning">
                    <td><a href="/admin/patient/{{$patient->id}}/details">{{$patient->name}}</a></td>
                    <td>{{$patient->phone}}</td>
                    <td>
                        {{-- accept button --}}
                        {!! Form::open(['action' => ['AdminPatientController@unblock', $patient->id], 'method'
                        =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Unblock Doctor', ['class' => 'btn btn-success']) !!}
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