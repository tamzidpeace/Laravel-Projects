@extends('layouts.app')


@section('content')
	
	<h1>Todos</h1>
	
	
	{{--{!! Form::open(['method' => 'post', 'action' => 'TodosController@store']) !!}
	
	<div class="form-group">
		{!! Form::label('text', 'Title') !!}
		{!! Form::text('text', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('body', 'Body') !!}
		{!! Form::text('body', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{!! Form::label('due', 'Due') !!}
		{!! Form::text('due', null, ['class' => 'form-control']) !!}
	</div>
	
	<div class="form-group">
		{{Form::submit('Click Me!', ['class'=> 'btn btn-primary'])}}
	</div>
	
	{!! Form::close() !!}--}}
	
	
	<form action="{{action('TodosController@store')}}" method="POST">
		{{csrf_field()}}
		<div class="form-group">
			<label for="text">Title</label>
			<input type="text" class="form-control" id="text" name="text">
		</div>
		<div class="form-group">
			<label for="body">Body</label>
			<input type="text" class="form-control" id="body" name="body">
		</div>
		<div class="form-group">
			<label for="due">Due</label>
			<input type="text" class="form-control" id="due" name="due">
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	
	</form>
	
	
	{{--testing--}}
	
	
	


@stop

