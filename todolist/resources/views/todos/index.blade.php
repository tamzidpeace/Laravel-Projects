@extends('layouts.app')


@section('content')
	
	<h1>Todos</h1>
	
	<div class="form-group">
		<form action="{{route('todo.create')}}">
			<button class="btn btn-info">New Todo</button>
		</form>
	</div>
	
	@foreach($todos as $todo)
		
		<div class="well">
			<h3><a href="todo/{{$todo->id}}">{{$todo->text }}</a> <span
						class="label label-danger"> {{$todo->due}}</span></h3>
		</div>
	
	@endforeach




@stop

