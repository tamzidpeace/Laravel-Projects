@extends('layouts.hospital')

@section('content')
<h1>All Doctors</h1>

<table class="table table-hover">
    <tr>
        <th>name</th>
    </tr>

    @foreach ($doctors as $doctor)
    <tr>
        <td>{{ $doctor->name }}</td>
    </tr>
    @endforeach

</table>

@endsection