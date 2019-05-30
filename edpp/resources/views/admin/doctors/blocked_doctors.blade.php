@extends('layouts.admin')

@section('content')

<h1>Blocked Doctors</h1>

<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)

                <tr>
                    <td><a href="/admin/doctor/{{$doctor->id}}/detailes">{{$doctor->name}}</a></td>

                    <td>
                        {{-- accept button --}}
                        {!! Form::open(['action' => ['AdminDoctorController@unblock', $doctor->id], 'method' =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Unblock Doctor', ['class' => 'btn btn-warning']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>

                    {{-- reject button --}}
                    <td>
                        {!! Form::open(['action' => ['AdminDoctorController@rejectOrRemove', $doctor->id], 'method' =>
                        'delete']) !!}

                        <div class="form-group">
                            {!! Form::submit('Remove Doctor', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>

                </tr>

                @endforeach

            </tbody>
    </div>
</div>

@endsection