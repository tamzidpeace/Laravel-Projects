@extends('layouts.doctor')

@section('content')

<div class="container">
    <div class="row">
        <h1>Working Hospitals</h1>

        <table class="table">
            <tr>
                <th>Hospital Name</th>
                <th>Working Status</th>
            </tr>

            @foreach ($hospitals as $hospital)
            <tr>
                <td>{{$hospital->name}}</td>
                <td>{{$hospital->pivot->status}}</td> 
            </tr>
            @endforeach
        </table>

    </div>
</div>

@endsection