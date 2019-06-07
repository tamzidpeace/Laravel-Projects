@extends('layouts.admin')


@section('content')
@if (count($hospitals) > 0)
<div class="container">
    <div class="row">
        <table class="table">
            <h1>Available Hospitals</h1>
            <tr>
                <th>Hospital Name</th>
                <th>Phone Number</th>
            </tr>

            @foreach ($hospitals as $hospital)
            <tr>
                <td>{{$hospital->name}}</td>
                <td>{{$hospital->phone}}</td>
            </tr>
            @endforeach

        </table>
    </div>
</div>

@else
<h1 class="text-danger">Nothing has found!</h1>
@endif

@endsection