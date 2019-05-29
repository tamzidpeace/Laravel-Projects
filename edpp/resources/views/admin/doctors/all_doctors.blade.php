@extends('layouts.admin')

@section('content')
<h1>All Doctors</h1>

<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)

                <tr>
                    <td>{{$doctor->name}}</td>
                    <td>{{$doctor->phone}}</td>
                    <td>{{$doctor->status}}</td>
                </tr>

                @endforeach

            </tbody>
    </div>
</div>

@endsection