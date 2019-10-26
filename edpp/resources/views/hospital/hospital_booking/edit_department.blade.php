@extends('layouts.hospital')


@section('content')

<h1>Handle Hospital Department</h1>

<div class="row specialist">
    <div class="col-md-8">
        {!! Form::open(['method' => 'patch', 'action' => ['HospitalBookingController@editedDepartment', $dpt->id]]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Department Name') !!}
            {!! Form::text('name', $dpt->department_name, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary btn-block']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>


@endsection