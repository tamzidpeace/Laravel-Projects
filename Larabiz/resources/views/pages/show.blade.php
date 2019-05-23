@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Details
							<a href="/home" class="btn btn-primary pull-right">Go
								Back</a>
						</h2>
					</div>
					
					<div class="panel-body">
						<h3>Company Name: <span class="label label-primary">{{$list->name}}</span></h3>
						<h3>Address: <span class="label label-primary">{{$list->address}}</span></h3>
						<h3>Email: <span class="label label-primary">{{$list->email}}</span></h3>
						<h3>Phone: <span class="label label-primary">{{$list->phone}}</span></h3>
						<h3>Website: <span class="label label-primary">{{$list->website}}</span></h3>
						<h3>Bio: <span class="label label-primary">{{$list->bio}}</span></h3>
						<h3>Created: <span
									class="label label-primary">{{$list->created_at ? $list->created_at->diffForHumans(): 'N/A'}}</span>
						</h3>
						<h3>Updated: <span
									class="label label-primary">{{$list->updated_at ? $list->updated_at->diffForHumans() : 'N/A'}}</span>
						</h3>
					</div>
				</div>
			</div>
		</div>
	</div>

@stop