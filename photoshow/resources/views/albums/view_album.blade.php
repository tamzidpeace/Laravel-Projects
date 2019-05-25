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
	
	<div class="add-photo" style="margin-top: 30px; margin-bottom: 30px;">
		<a href="/photo/creates/{{$album->id}}" class="btn btn-primary btn-block">Add Photo</a>
	</div>
	
	<div class="row" style="margin-bottom: 50px;">
		@foreach($photos as $photo)
			@if ($count++ % 4 == 1)
				<div class="col-sm-3">
					
					<img class="img-thumbnail" style="height: 200px; width: 200px; margin: 5px;"
					     src="/images/cover_images/photos/{{$photo->photo}}" alt="">
					<p style="font-weight: bold">{{$photo->title}}</p>
				
				</div>
			@elseif ($count++ % 4 == 2)
				<div class="col-sm-3">
					
					<img class="img-thumbnail" style="height: 200px; width: 200px; margin: 5px;"
					     src="/images/cover_images/photos/{{$photo->photo}}" alt="">
					<p style="font-weight: bold">{{$photo->title}}</p>
				
				</div>
			@elseif ($count++ % 4 == 3)
				<div class="col-sm-3">
					
					<img class="img-thumbnail" style="height: 200px; width: 200px; margin: 5px;"
					     src="/images/cover_images/photos/{{$photo->photo}}" alt="">
					<p style="font-weight: bold">{{$photo->title}}</p>
				</div>
			@else
				<div class="col-sm-3">
					
					<img style="height: 200px; width: 200px; margin: 5px;" class="img-thumbnail"
					     src="/images/cover_images/photos/{{$photo->photo}}" alt="">
					<p style="font-weight: bold">{{$photo->title}}</p>
				</div>
			@endif
		@endforeach
	</div>

@stop