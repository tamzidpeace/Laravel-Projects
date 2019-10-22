@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>New Emergency Service Requests</h1>

        <div class="col-md-8">
            <table class="table table-bordered">
                <tr class="info">
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                @foreach ($new_es as $es)

                <tr>
                    <td>{{$es->name}}</td>
                    <td>{{$es->address}}</td>
                    <td>{{$es->email}}</td>
                    <td>{{$es->phone}}</td>
                    <td> {{$es->status}} </td>
                    <td>
                        {{-- active button --}}
                        {!! Form::open(['action' => ['EmergencyController@active', $es->id], 'method'
                        =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Active', ['class' => 'btn btn-success']) !!}
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