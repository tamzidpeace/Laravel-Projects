@extends('layouts.hospital')


@section('content')

<h1>department</h1>

<div class="row specialist">
    <div class="col-md-8">
        {!! Form::open(['method' => 'POST', 'action' => 'HospitalBookingController@addDepartment']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Department Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Add', ['class' => 'btn btn-primary btn-block']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>
    
@endsection