@extends('layouts.admin')

@section('content')

<h1>Users</h1>


<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)

        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role ? $user->role->name : 'N/A'}}</td>
        </tr>

        @endforeach

    </tbody>
</table>


@endsection