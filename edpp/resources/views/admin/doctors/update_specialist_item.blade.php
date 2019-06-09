@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Update Specialist Item</h1>

        {!! Form::open(['action' => ['AdminDoctorController@updateSpecialistItem', $specialist->id],
        'method' =>'patch'])
        !!}

        <div class="form-group">
            {!! Form::label('name', 'Specialist Type') !!}
            {!! Form::text('name', $specialist->name, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-info']) !!}
        </div>
        
        {!! Form::close() !!}
    </div>
</div>
    
@endsection