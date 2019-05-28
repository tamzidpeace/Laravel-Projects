@extends('layouts.admin')


@section('content')

<h1>Blocked Hospitals</h1>

<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)

                <tr>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->address}}</td>
                    <td>
                    {!! Form::open(['action' => ['AdminHospitalController@unblock', $hospital->id], 'method' =>'patch']) !!}
                    
                    <div class="form-group">
                        {!! Form::submit('Unblock', ['class' => 'btn btn-success']) !!}
                    </div>
                    
                    {!! Form::close() !!}    
                    </td>
                </tr>

                @endforeach

            </tbody>
    </div>
</div>

@endsection