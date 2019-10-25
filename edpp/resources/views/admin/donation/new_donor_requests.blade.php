@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>New Donor Requests</h1>

        <div class="col-md-8">
            <table class="table table-bordered">
                <tr class="info">
                    <th>Name</th>
                    <th>Address</th>
                    <th>Blood_Group</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                @foreach ($donors as $donors)

                <tr>
                    <td>{{$donors->name}}</td>
                    <td>{{$donors->address}}</td>
                    <td>{{$donors->bloodGroup->name}}</td>
                    <td>{{$donors->phone}}</td>
                    <td> {{$donors->status}} </td>
                    <td>
                        active button
                        {!! Form::open(['action' => ['AdminDonationController@active', $donors->id], 'method'
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