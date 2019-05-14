@extends('layouts.admin')

@section('content')
	
	<h1>Update Categories</h1>
	
	{!! Form::model($categories, ['action' => ['AdminCategoriesController@update', $categories->id], 'method' => 'patch']) !!}
	
	<div class="form-group">
		{!! Form::label('name', 'Name') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!!  Form::submit('Update Category', ['class' => 'btn btn-primary btn-block']) !!}
	</div>
	
	{!! Form::close() !!}
	
	<div style="padding: 5px;">
		
		{!! Form::open(['action' => ['AdminCategoriesController@destroy', $categories->id], 'method' => 'delete']) !!}
		
		
		<div class="form-group">
			{!!  Form::submit('Delete Categories', ['class' => 'btn btn-danger btn-block']) !!}
		</div>
		
		{!! Form::close() !!}
	</div>
 
@stop