@extends('layouts.hospital')

@section('content')
<h1>All Doctors</h1>

<table class="table table-hover">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Request</th>
    </tr>

    @foreach ($doctors as $doctor)
    <tr>
        <td>{{ $doctor->name }}</td>
        <td>{{ $doctor->email }}</td>

        <td>{{ $doctor->pivot->status }}</td>

    </tr>
    @endforeach

</table>

@endsection