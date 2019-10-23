@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Registered Donors </h1>

        <div class="col-md-8">
            <table class="table table-bordered">
                <tr class="info">
                    <th>Name</th>
                    <th>Address</th>
                    <th>Blood_Group</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            
                @foreach ($registered_donors as $donor)
            
               <tr>
                    <td>{{$donor->name}}</td>
                    <td>{{$donor->address}}</td>
                    <td>{{$donor->bloodGroup->name}}</td>
                    <td>{{$donor->phone}}</td>
                    <td> {{$donor->status}} </td>
                   <td>
                        {{-- inactive button --}}
                        {!! Form::open(['action' => ['AdminDonationController@inactive', $donor->id], 'method'
                        =>'patch'])
                        !!}

                        <div class="form-group">
                            {!! Form::submit('Inactive', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td> 

                     <td>
                        {{-- block button --}}
                        {!! Form::open(['action' => ['AdminDonationController@blocked', $donor->id], 'method'
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

    