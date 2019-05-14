@extends('layouts.admin')

@section('content')
	
	<h1>Categories</h1>
	
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
		
		@if($categories)
			@foreach($categories as $category)
				<tr>
					<th>{{$category->id}}</th>
					<td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
					<td>{{$category->created_at ? $category->created_at : 'N/A'}}</td>
					<td>{{$category->updated_at ? $category->updated_at : 'N/A'}}</td>
				</tr>
		@endforeach
		@endif
	
	</table>

@stop