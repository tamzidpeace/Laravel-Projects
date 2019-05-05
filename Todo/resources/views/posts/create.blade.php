@extends('layouts.app')

@section('content')

<h1>Create Post</h1>

<form action="/posts" method="post">
    <div class="form-group">
        <label>Email post title</label>
        <input type="text" name="title" class="form-control" placeholder="Enter post title">
        {{ csrf_field() }}
    </div>
    <input type="submit" class="btn btn-success" name="submit">
</form>

@endsection