@extends('layouts.app')

@section('content')
	
	<div class="row" style="margin-bottom: 10px;">
		<h1>Albums <a class="btn btn-primary pull-right" href="/album/create">Add New Album</a></h1>
	</div>
	
	<div class="row">
		@if ($albums)
			@foreach($albums as $album)
				@if ($count++ % 3 == 1)
					<div class="col-sm-4">
						<img class="img-thumbnail" style="height: 200px; width: 200px;"
						     src="{{'/images/cover_images/' . $album->cover_image}}"
						     alt="">
						<a href="#"><h3>{{$album->name}}</h3></a>
					</div>
				@elseif($count++ % 3 == 2)
					<div class="col-sm-4">
						<img class="img-thumbnail" style="height: 200px; width: 200px;"
						     src="{{'/images/cover_images/' . $album->cover_image}}" alt="">
						<a href="#"><h3>{{$album->name}}</h3></a>
					</div>
				@else
					<div class="col-sm-4">
						<img class="img-thumbnail" style="height: 200px; width: 200px;"
						     src="{{'/images/cover_images/' . $album->cover_image}}" alt="">
						<a href="#"><h3>{{$album->name}}</h3></a>
					</div>
				
				
				@endif
			@endforeach
		
		@endif
	</div>


@stop