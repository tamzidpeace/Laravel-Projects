@extends('layouts.app')

@section('content')
	
	<h1>New Album</h1>
	
	{!! Form::open(['action' => 'AlbumsController@store', 'method' => 'post', 'files'=> 'true']) !!}
	
	<div class="form-group">
		{!! Form::label('name', 'Album Name') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('description', 'Description') !!}
		{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('cover_image', 'Cover Image') !!}
		{!! Form::file('cover_image', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!!  Form::submit('Create Album', ['class' => 'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}

@stop