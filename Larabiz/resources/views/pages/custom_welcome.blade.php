@extends('layouts.app')

@section('content')
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Dashboard
							<a href="/list/create" class="btn btn-primary pull-right">Add List</a>
						</h2></div>
					
					<div class="panel-body">
						@if (session('status'))
							<div class="alert alert-success">
								{{ session('status') }}
							</div>
						@endif
						<h3>Latest Listings</h3>
						@if ($listings)
							<ul class="list-group">
								@foreach($listings as $list)
									<a href="/list/{{$list->id}}"><li class="list-group-item">{{$list->name}}</li></a>
								@endforeach
							</ul>
						
						
						@else
							<h4>No List Available</h4>
						@endif
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-6 col-sm-offset-5">
				{{$listings->render()}}
			</div>
		</div>
	</div>

@stop