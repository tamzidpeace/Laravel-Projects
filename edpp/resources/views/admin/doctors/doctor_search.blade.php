@extends('layouts.admin')


@section('content')
@if (count($doctors) > 0)
    <div class="container">
        <div class="row">
            <table class="table">
                <h1>Available Doctors</h1>
                <tr>
                    <th>Doctor Name</th>
                    <th>Phone Number</th>
                </tr>

                @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->phone}}</td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
    
@else
    <h1 class="text-danger">Nothing has found!</h1>
@endif
    
@endsection