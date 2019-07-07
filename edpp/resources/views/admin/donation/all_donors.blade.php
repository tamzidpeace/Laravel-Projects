@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>All Donors</h1>

        <div class="col-md-8">
            <table class="table table-bordered">
                <tr class="info">
                    <th>Name</th>
                    <th>Bloodgroup</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>

                @foreach ($donors as $donor)

                <tr>
                    <td>{{$donor->name}}</td>
                    <td>{{$donor->bloodGroup->name}}</td>
                    <td>{{$donor->phone}}</td>
                    <td>{{$donor->address}}</td>
                </tr>

                @endforeach
            </table>
        </div>

    </div>
</div>

@endsection