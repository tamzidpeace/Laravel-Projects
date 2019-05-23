@extends('layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading"><h2>Add Listing
							<a href="/home" class="btn btn-primary pull-right">Go
								Back</a>
						</h2>
					</div>
					
					<div class="panel-body">
						
						{!! Form::model($list,['action' => ['ListingsController@update', $list->id], 'method' => 'patch']) !!}
						
						<div class="form-group">
							{!! Form::label('name', 'Company Name') !!}
							{!! Form::text('name', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!! Form::label('address', 'Address') !!}
							{!! Form::text('address', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!! Form::label('email', 'Email') !!}
							{!! Form::text('email', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!! Form::label('website', 'Website') !!}
							{!! Form::text('website', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!! Form::label('phone', 'Phone') !!}
							{!! Form::text('phone', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!! Form::label('bio', 'Bio') !!}
							{!! Form::text('bio', null, ['class' => 'form-control']) !!}
						</div>
						
						<div class="form-group">
							{!!  Form::submit('Update', ['class' => 'btn btn-primary']) !!}
						</div>
						
						{!! Form::close() !!}
					
					</div>
				</div>
			</div>
		</div>
	</div>

@stop