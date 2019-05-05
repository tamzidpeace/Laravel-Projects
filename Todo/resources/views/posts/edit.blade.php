@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>

<form method="post" action="/posts/{{$post->id}}">

    {{ csrf_field() }}
    <div class="form-group">
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$post->title}}">
    </div>

    <input type="submit" name="submit" name="update" class="btn btn-success" style="margin:10px">

</form>

{{-- Delete  --}}
<form method="post" action="/posts/{{$post->id}}">

    {{ csrf_field() }}
    <div>
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="DELETE" class="btn btn-danger" style="margin:10px">
    </div>


</form>

@endsection