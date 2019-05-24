@extends('layouts.app')


@section('content')
	
	<div class="row">
		
		<div class="col-sm-offset-5">
			<h1 style="" class="">{{$album->name}}</h1>
			<img class="img-thumbnail" style="width: 350px; height: 350px;"
			     src="/images/cover_images/{{$album->cover_image}}" alt="">
		</div>
		
		<div style="margin-top: 30px; margin-left: 530px;" class="">
			<a class="btn btn-primary" href="/album/{{$album->id}}/edit">Update Album</a>
		</div>
		
		<div style="margin-top: 5px; margin-left: 530px;">
			{!! Form::open(['action' => ['AlbumsController@destroy', $album->id], 'method' => 'delete']) !!}
			
			<div class="form-group" style="margin-left: 150px; margin-top: -40px;">
				{!!  Form::submit('Remove Album', ['class' => 'btn btn-danger']) !!}
			</div>
			
			{!! Form::close() !!}
		</div>
	
	</div>

@stop