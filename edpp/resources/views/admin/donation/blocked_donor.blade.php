@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Blocked Donors</h1>

        <div class="col-md-8">
            <table class="table table-bordered">
                <tr class="info">
                    <th>Name</th>
                    <th>Address</th>
                    <th>BloodGroup</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                @foreach ($blocked_donor as $donor)

                <tr>
                    <td>{{$donor->name}}</td>
                    <td>{{$donor->address}}</td>
                    <td>{{$donor->bloodGroup->name}}</td>
                    <td>{{$donor->phone}}</td>
                    <td> {{$donor->status}} </td>
                    <td>
                        {{-- active button --}}
                        {!! Form::open(['action' => ['AdminDonationController@active', $donor->id], 'method'
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