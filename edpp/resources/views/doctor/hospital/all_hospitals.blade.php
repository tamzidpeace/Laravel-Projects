@extends('layouts.doctor')

@section('content')

<div class="container">
    <div class="row">
        <h1>All Hospitals</h1>

        <table class="table">
            <tr>
            <th>Name</th>
            <th>Email</th>
            </tr>

            @foreach ($hospitals as $hospital)
            <tr>
                <td>{{$hospital->name}}</td>
                <td>{{$hospital->email}}</td>
            </tr>
            @endforeach
        </table>

        
    </div>
</div>

@endsection