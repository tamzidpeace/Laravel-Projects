@extends('layouts.doctor')

@section('content')

<h1>working state</h1>

{!! Form::open(['action' => 'DoctorController@workingStateResult', 'method' =>'GET'])
!!}

{{Form::checkbox('name', 'value')}}

<span class="input-group-btn">
    <button class="btn btn-default" type="submit"> <span style="font-weight:bold;" class="">Search</span>
    </button>
</span>

{!! Form::close() !!}

@endsection