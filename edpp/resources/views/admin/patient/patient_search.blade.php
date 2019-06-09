@extends('layouts.admin')


@section('content')
@if (count($patients) > 0)
<div class="container">
    <div class="row">
        <table class="table">
            <h1>Search Result</h1>
            <tr>
                <th>Patient Name</th>
                <th>Phone Number</th>
            </tr>

            @foreach ($patients as $patient)
            <tr>
                <td><a href="/admin/patient/{{$patient->id}}/details">{{$patient->name}}</a></td>
                <td>{{$patient->phone}}</td>
            </tr>
            @endforeach

        </table>
    </div>
</div>

@else
<h1 class="text-danger">Nothing has found!</h1>
@endif

@endsection