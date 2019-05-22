@extends('layouts.app')

@section('content')
	
	
	{!! Form::model($todo, ['action' => ['TodosController@update', $id], 'method' => 'PATCH']) !!}
	
	<div class="form-group">
		{!! Form::label('text', 'Text') !!}
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
		{!!  Form::submit('Update', ['class' => 'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}

@stop