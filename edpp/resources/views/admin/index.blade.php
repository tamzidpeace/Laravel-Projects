@extends('layouts.admin')

@section('content')

<h1>index</h1>

<div class="container">
    <div class="row">

        
        {{-- search bar  for hospital--}}
        
        <form action="/admin/search/hospitals" method="GET">
            <div class="row">
        
        
                {{-- search form --}}
                {!! Form::open(['action' => ['AdminController@hospitalSearch'], 'method' =>'get'])
                !!}
        
                <div>
                    <h3>Hospital Search</h3>
                </div>
        
                <div class="form-group col-md-5">
                    {!! Form::text('search' , null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group col-md-3">
                    {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
        
                </div>
        
                {!! Form::close() !!}
            </div>
        </form>
        
        
        {{-- search bar  for doctor--}}

        <form action="/admin/search/doctors" method="GET">
            <div class="row">


                {{-- search form --}}
                {!! Form::open(['action' => ['AdminController@doctorSearch'], 'method' =>'get'])
                !!}

                <div>
                    <h3>Doctor Search</h3>
                </div>

                <div class="form-group col-md-5">
                    {!! Form::text('search' , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-3">
                    {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}

                </div>

                {!! Form::close() !!}
            </div>
        </form>


        {{-- search bar  for patient --}}
        
        <form action="/admin/search/patients" method="GET">
            <div class="row">
        
        
                {{-- search form --}}
                {!! Form::open(['action' => ['AdminController@patientSearch'], 'method' =>'get'])
                !!}
        
                <div>
                    <h3>Patient Search</h3>
                </div>
        
                <div class="form-group col-md-5">
                    {!! Form::text('search' , null, ['class' => 'form-control']) !!}
                </div>
        
                <div class="form-group col-md-3">
                    {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
        
                </div>
        
                {!! Form::close() !!}
            </div>
        </form>


    </div>
</div>

@stop