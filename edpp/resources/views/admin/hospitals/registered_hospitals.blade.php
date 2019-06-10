@extends('layouts.admin')


@section('content')

<h1>Registered Hospitals</h1>

<div class="container">
    <div class="row">

        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr class="info">
                        <th>Hospital Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hospitals as $hospital)

                    <tr class="warning">
                        <td><a href="/admin/hospital/{{$hospital->id}}/detailes">{{$hospital->name}}</a></td>
                        <td>{{$hospital->address}}</td>
                        <td>
                            {!! Form::open(['action' => ['AdminHospitalController@block', $hospital->id], 'method'
                            =>'patch']) !!}

                            <div class="form-group">
                                {!! Form::submit('Block', ['class' => 'btn btn-danger btn-block']) !!}
                            </div>

                            {!! Form::close() !!}
                        </td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection