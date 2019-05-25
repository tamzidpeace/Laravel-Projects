@extends('layouts.app')

@section('content')
	<div class="row">
		
		<h1>Add New Photo <a class="btn btn-primary pull-right" href="/album/{{$album->id}}/show">Go Back</a></h1>
		
		{!! Form::open(['action' => 'PhotosController@store', 'method' => 'post', 'files'=> 'true']) !!}
		
		<input type="hidden" id="album_id" name="album_id" value="{{$album->id}}">
		
		<div class="form-group">
			{!! Form::label('title', 'Title') !!}
			{!! Form::text('title', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('description', 'Description') !!}
			{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!! Form::label('photo', 'Photo') !!}
			{!! Form::file('photo', null, ['class' => 'form-control']) !!}
		</div>
		
		<div class="form-group">
			{!!  Form::submit('Add Photo', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
	
	</div>

@stop