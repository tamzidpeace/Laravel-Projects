@extends('layouts.admin')


@section('content')

<h1>All Hospitals</h1>

<div class="container">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)

                <tr>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->address}}</td>
                    <td>{{$hospital->status}}</td>
                </tr>

                @endforeach

            </tbody>
    </div>
</div>

@endsection