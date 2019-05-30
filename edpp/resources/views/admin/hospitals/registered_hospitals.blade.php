@extends('layouts.admin')


@section('content')

<h1>Registered Hospitals</h1>

<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)

                <tr>
                   <td><a href="/admin/hospital/{{$hospital->id}}/detailes">{{$hospital->name}}</a></td>
                    <td>{{$hospital->address}}</td>
                    <td>
                        {!! Form::open(['action' => ['AdminHospitalController@block', $hospital->id], 'method' =>'patch']) !!}
                        
                        <div class="form-group">
                            {!! Form::submit('Block', ['class' => 'btn btn-danger']) !!}
                        </div>
                        
                        {!! Form::close() !!}
                    </td>
                </tr>

                @endforeach

            </tbody>
    </div>
</div>

@endsection