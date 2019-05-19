@extends('layouts.blog-post')

@section('content')
	<!-- Blog Post -->
	
	<!-- Title -->
	<h1>{{$post->title}}</h1>
	
	<!-- Author -->
	<p class="lead">
		by <a href="#">{{$post->user->name}}</a>
	</p>
	
	<hr>
	
	<!-- Date/Time -->
	<p><span class="glyphicon glyphicon-time"></span> Posted: {{$post->created_at->diffForHumans()}}</p>
	
	<hr>
	
	<!-- Preview Image -->
	<img class="img-responsive" src="{{$post->photo ? $post->photo->file : "http://placehold.it/400x400"}}"
	     alt="http://placehold.it/400x400">
	
	<hr>
	
	<!-- Post Content -->
	
	<p>{{$post->body}}</p>
	
	<hr>
	
	
	
	<!-- Comments Form -->
	@if (Auth::check())
		
		
		<div class="well">
			<h4>Leave a Comment:</h4>
			
			
			{!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}
			{!! csrf_field() !!}
			
			<input type="hidden" name="post_id" value="{{$post->id}}">
			
			
			<div class="form-group">
				{!! Form::label('body', 'Body:') !!}
				{!! Form::textarea('body', null, ['class'=>'form-control','rows'=>3])!!}
			</div>
			
			<div class="form-group">
				{!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
			</div>
			{!! Form::close() !!}
		
		
		</div>
	
	@endif
	
	<hr>
	
	<!-- Posted Comments -->
	
	
	<!-- Comment -->
	<div class="media">
		
		
		<div class="media-body">
			<h4 class="media-heading">
				<small>Comments</small>
			</h4>
			@foreach($comments as $comment)
				<a class="" href="#">
					<img height="64" class="media-object" src="{{$comment->photo}}" alt="">
				</a>
				<p>{{$comment->body}}</p>
		@endforeach
		
		
		
		<!-- Nested Comment -->
			<div id="nested-comment" class=" media">
				<a class="pull-left" href="#">
					<img height="64" class="media-object" src="" alt="">
				</a>
				<div class="media-body">
					<h4 class="media-heading">
						<small></small>
					</h4>
					<p></p>
				</div>
				
				
				<div class="comment-reply-container">
					
					
					<button class="toggle-reply btn btn-primary pull-right">Reply</button>
					
					
					<div class="comment-reply col-sm-6">
						
						
						{!! Form::open(['method'=>'']) !!}
						<div class="form-group">
							
							<input type="hidden" name="comment_id" value="">
							
							{!! Form::label('body', 'Body:') !!}
							{!! Form::textarea('body', null, ['class'=>'form-control','rows'=>1])!!}
						</div>
						
						<div class="form-group">
							{!! Form::submit('submit', ['class'=>'btn btn-primary']) !!}
						</div>
						{!! Form::close() !!}
					
					
					</div>
				
				</div>
				<!-- End Nested Comment -->
			
			
			</div>
		
		</div>
	</div>


@stop