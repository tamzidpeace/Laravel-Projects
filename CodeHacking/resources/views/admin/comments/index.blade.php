@extends('layouts.admin')

@section('content')
	
	<h1>Comments</h1>
	
	@if (count($comments) > 0)
		
		<table class="table">
			<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Comment</th>
				<th scope="col">Comment By</th>
				<th scope="col">Email</th>
				<th scope="col">Post</th>
				<th scope="col">Approve/Un-Approve</th>
				<th scope="col">Delete</th>
			</tr>
			</thead>
			<tbody>
			@foreach($comments as $comment)
				<tr>
					<th>{{$comment->id}}</th>
					<td>{{$comment->body}}</td>
					<td>{{$comment->author}}</td>
					<td>{{$comment->email}}</td>
					<td><a href="{{route('home.post', $comment->post->id)}}">View Post</a></td>
					<td>
						@if ($comment->is_active == 1)
							
							{!! Form::open(['action' => ['PostCommentsController@update', $comment->id], 'method' => 'patch']) !!}
							
							<input type="hidden" value="0" name="is_active">
							<div class="form-group">
								{!!  Form::submit('Un-Approve', ['class' => 'btn btn-info']) !!}
							</div>
							
							{!! Form::close() !!}
						
						
						
						@elseif($comment->is_active == 0)
							
							{!! Form::open(['action' => ['PostCommentsController@update', $comment->id], 'method' => 'patch']) !!}
							
							<input type="hidden" value="1" name="is_active">
							<div class="form-group">
								{!!  Form::submit('Approve', ['class' => 'btn btn-success']) !!}
							</div>
							
							{!! Form::close() !!}
						
						@endif
					</td>
					
					<td>
						{!! Form::open(['action' => ['PostCommentsController@destroy', $comment->id], 'method' => 'delete']) !!}
						
						<div class="form-group">
							{!!  Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						</div>
						
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	
	@endif
@stop