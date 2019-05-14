@extends('layouts.admin')

@section('content')
	<h1>Edit Posts</h1>
	
	<div class="row">
		
		<div class="col-sm-3">
			<img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""
			     class="img-responsive img-rounded">
		</div>
		
		<div class="col-sm-9">
			
			{!! Form::model($post, ['method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files'=> true]) !!}
			
			<div class="form-group">
				{!! Form::label('title', 'Title') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('body', 'Description') !!}
				{!! Form::textarea('body', null, ['class' => 'form-control', 'rows'=>5]) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('category_id', 'Category:') !!}
				{!! Form::select('category_id', ['' => 'Choose Option'] + $categories ,null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!! Form::label('photo_id', 'Photo') !!}
				{!! Form::file('photo_id', null, ['class' => 'form-control']) !!}
			</div>
			
			<div class="form-group">
				{!!  Form::submit('Update Post', ['class' => 'btn btn-primary btn-block']) !!}
			</div>
			
			{!! Form::close() !!}
			
			<div style="padding: 5px;">
				
				{!! Form::open(['action' => ['AdminPostsController@destroy', $post->id], 'method' => 'delete']) !!}
				
				
				<div class="form-group">
					{!!  Form::submit('Delete Post', ['class' => 'btn btn-danger btn-block']) !!}
				</div>
				
				{!! Form::close() !!}
			</div>
		
		</div>
	
	</div>
	
	
	
	{{--<div class="row">
		@include('includes.form_errors')
	</div>--}}
@stop