@extends('layouts.admin')

@section('content')

<h1>New Requests</h1>

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
                        {!! Form::open(['action' => ['AdminDoctorController@accept', $doctor->id], 'method' =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Accept Request', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>

                    {{-- reject button --}}
                    <td>
                        {!! Form::open(['action' => ['AdminDoctorController@rejectOrRemove', $doctor->id], 'method'
                        =>'delete']) !!}

                        <div class="form-group">
                            {!! Form::submit('Reject it', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>

                </tr>

                @endforeach

            </tbody>
    </div>
</div>

@endsection