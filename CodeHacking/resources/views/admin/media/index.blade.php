@extends('layouts.admin')


@section('content')
	
	<h1>Media</h1>
	
	<table class="table">
		<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Name</th>
			<th scope="col">Created</th>
			<th scope="col">Updated</th>
		</tr>
		</thead>
		<tbody>
		
		@if ($photos)
			@foreach($photos as $photo)
				
				<tr>
					<th>{{$photo->id}}</th>
					<td><img height="70" src="{{$photo->file}}" alt=""></td>
					<td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'N/A'}}</td>
					<td>{{$photo->updated_at ? $photo->updated_at->diffForHumans() : 'N/A'}}</td>
					<td>
						{!! Form::open(['action' => ['AdminMediaController@destroy', $photo->id], 'method' => 'delete']) !!}
						
						<div class="form-group">
							{!!  Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
						</div>
						
						{!! Form::close() !!}
					</td>
				</tr>
			
			@endforeach
		@endif
		
		</tbody>
	</table>

@stop