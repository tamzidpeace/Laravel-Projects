@extends('layouts.app')


@section('content')
	
	<h1>Todos</h1>
	
	
	<div id="new-todo" class="text-center">
		<a class="btn btn-info" href="todo/create">New Todo</a>
	</div>
	
	@foreach($todos as $todo)
		
		<div class="well text-center">
			<h3><a href="todo/{{$todo->id}}">{{$todo->text }}</a> <span
						class="label label-danger"> {{$todo->due}}</span></h3>
		</div>
	
	@endforeach




@stop

