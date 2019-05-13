@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_User'))
        <p class="bg-danger">{{session('deleted_User')}}</p>
    @endif


    <h1>Users</h1>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">User Photo</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>

        </tr>
        </thead>
        <tbody>
        @if ($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"
                             alt="N/A"></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'N/A'}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach

        @endif
        </tbody>
    </table>

@stop