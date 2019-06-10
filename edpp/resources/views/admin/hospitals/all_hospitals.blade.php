@extends('layouts.admin')


@section('content')

<h1>All Hospitals</h1>

<div class="container">
    <div class="row">

        <div class="col-md-8">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="info">
                        <th>Hospital Name</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hospitals as $hospital)

                    <tr class="warning">
                        <td><a href="/admin/hospital/{{$hospital->id}}/detailes">{{$hospital->name}}</a></td>
                        <td>{{$hospital->address}}</td>
                        <td>{{$hospital->status}}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>


    </div>
</div>

@endsection