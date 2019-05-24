@extends('layouts.app')

@section('content')
	
	<div class="row">
		
		<h1>Edit Album <a class="btn btn-primary pull-right" href="/album/{{$id}}/show">Go Back</a></h1>
		
		{!! Form::model($album, ['action' => ['AlbumsController@update', $album->id], 'method' => 'patch', 'files'=> 'true']) !!}
		
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
			{!!  Form::submit('Update Album', ['class' => 'btn btn-primary']) !!}
		</div>
		
		{!! Form::close() !!}
	
	</div>

@stop