@extends('layouts.app')

@section('content')
<h1>Index Post</h1>
<ul class="list-group">
    @foreach ($posts as $post)
        <li class="list-group-item">
        <a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a>
        </li>
    @endforeach
</ul> 
    
@endsection