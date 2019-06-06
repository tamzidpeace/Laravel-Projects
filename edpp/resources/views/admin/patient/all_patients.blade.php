@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>All Patients</h1>

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Status</th>
            </tr>

            @foreach ($patients as $patient)
                
            <tr>
                <td>{{$patient->name}}</td>
                <td>{{$patient->phone}}</td>
                <td>{{$patient->status}}</td>
            </tr>

            @endforeach
        </table>

    </div>
</div>

@endsection