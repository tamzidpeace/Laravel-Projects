@extends('layouts.admin')

@section('content')
<h1>All Doctors</h1>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr class="info">
                        <th>Doctor Name</th>
                        <th>Contact Number</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)

                    <tr>
                        <td><a href="/admin/doctor/{{$doctor->id}}/detailes">{{$doctor->name}}</a></td>
                        <td>{{$doctor->phone}}</td>
                        <td>{{$doctor->status}}</td>
                    </tr>

                    @endforeach

                </tbody>
        </div>

    </div>
</div>

@endsection