@extends('layouts.doctor')

@section('content')

<div class="container">
    <div class="row">
        <h1>All Hospitals</h1>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Request</th>
            </tr>

            @foreach ($hospitals as $hospital)
            <tr>
                <td>{{$hospital->name}}</td>
                <td>{{$hospital->email}}</td>
                <td>

                    {{-- request button --}}
                    {!! Form::open(['action' => ['DoctorController@workingRequest', $hospital->id], 'method' =>'post'])
                    !!}

                    <div class="form-group">
                        {!! Form::submit('Request To Work', ['class' => 'btn btn-success']) !!}
                    </div>

                    {!! Form::close() !!}

                </td>
            </tr>
            @endforeach
        </table>


    </div>
</div>

@endsection