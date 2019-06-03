@extends('layouts.hospital')

@section('content')
<h1>Pending Requests</h1>

<div class="container">
    <div class="row">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
            </tr>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{$doctor->name}}
                <td>{{$doctor->phone}}</td>
            </tr>

            @endforeach
        </table>
    </div>
</div>

@endsection