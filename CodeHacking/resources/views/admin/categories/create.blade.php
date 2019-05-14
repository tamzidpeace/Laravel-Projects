@extends('layouts.admin')

@section('content')
	
	<h1>Create Categories</h1>
	
	{!! Form::open(['action' => 'AdminCategoriesController@store', 'method' => 'post']) !!}
	
	<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!!  Form::submit('Create Category', ['class' => 'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}

@stop