@extends('layouts.app')

@section('content')
	<div class="show">
		<h3>{{$todo->text}}</h3>
		<h4>{{$todo->body}}</h4>
		<h5>{{$todo->due}}</h5>
	</div>
	
	<form action="{{route('todo.edit', $todo->id)}}" method="">
		
		
		<button type="submit" class="btn btn-primary">Edit</button>
	
	</form>
	
	{!! Form::open(['action' => ['TodosController@destroy', $todo->id], 'method' => 'delete']) !!}
	
	<div class="form-group">
		{!!  Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
	</div>
	
	{!! Form::close() !!}

@stop


