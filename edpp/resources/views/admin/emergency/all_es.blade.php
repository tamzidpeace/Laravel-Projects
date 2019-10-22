@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>All Emergency Service</h1>

        <div class="col-md-8">
            <table class="table table-bordered">
                <tr class="info">
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                </tr>
            
                @foreach ($all_es as $es)
            
                <tr>
                    <td>{{$es->name}}</td>
                    <td>{{$es->address}}</td>
                    <td>{{$es->email}}</td>
                    <td>{{$es->phone}}</td>
                    <td> {{$es->status}} </td>
                </tr>

                @endforeach
            </table>
        </div>

    </div>
</div>

@endsection


    