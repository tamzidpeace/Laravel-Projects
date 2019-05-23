@extends('layouts.app')

@section('content')
	<div class="show text-center">
		<h3>{{$todo->text}}</h3>
		<h4>{{$todo->body}}</h4>
		<h5>{{$todo->due}}</h5>
	</div>
	
	<div class="form-group text-center">
		<form action="{{route('todo.edit', $todo->id)}}" method="">
			
			
			<button type="submit" class="btn btn-primary btn-block">Edit</button>
		
		</form>
	</div>
	
	
	{!! Form::open(['action' => ['TodosController@destroy', $todo->id], 'method' => 'delete']) !!}
	
	<div class="form-group text-center">
		{!!  Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
	</div>
	
	{!! Form::close() !!}

@stop


