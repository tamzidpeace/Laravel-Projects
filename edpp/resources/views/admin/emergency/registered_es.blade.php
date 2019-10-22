@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Registered Emergency Services</h1>

        <div class="col-md-8">
            <table class="table table-bordered">
                <tr class="info">
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            
                @foreach ($registered_es as $es)
            
                <tr>
                    <td>{{$es->name}}</td>
                    <td>{{$es->address}}</td>
                    <td>{{$es->email}}</td>
                    <td>{{$es->phone}}</td>
                    <td> {{$es->status}} </td>
                    <td>
                        {{-- inactive button --}}
                        {!! Form::open(['action' => ['EmergencyController@inactive', $es->id], 'method'
                        =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Inactive', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>

                    <td>
                        {{-- block button --}}
                        {!! Form::open(['action' => ['EmergencyController@blocked', $es->id], 'method'
                        =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Block', ['class' => 'btn btn-danger']) !!}
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


    