@extends('layouts.admin')

@section('content')

<h1>Registered Doctors</h1>

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
                    <td>{{$doctor->name}}</td>

                    <td>
                        {{-- accept button --}}
                        {!! Form::open(['action' => ['AdminDoctorController@block', $doctor->id], 'method' =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Block Doctor', ['class' => 'btn btn-warning']) !!}
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