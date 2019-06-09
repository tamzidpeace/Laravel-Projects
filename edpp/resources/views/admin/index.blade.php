@extends('layouts.admin')

@section('content')

{{-- <h1 class="">Search Content</h1> --}}
<h1> <span class="label label-primary search-content">Search Content</span></h1>

<div class="container">
    <div class="row">

        
        {{-- search bar  for hospital--}}
        
        <form action="/admin/search/hospitals" method="GET">
            <div class="row">
        
        
                {{-- search form --}}
                {!! Form::open(['action' => ['AdminController@hospitalSearch'], 'method' =>'get'])
                !!}
        
                <div>
                    <h3 class="search-title">Hospital Search</h3>
                </div>

                {{-- testing input group --}}
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for Hospital">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"> <span class="glyphicon glyphicon-search"></span> </button>
                        </span>
                    </div><!-- /input-group -->
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
                    <h3 class="search-title">Doctor Search</h3>
                </div>

                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for Doctor">
                        <span class="input-group-btn">
                           <button class="btn btn-primary" type="submit"> <span class="glyphicon glyphicon-search"></span> </button>
                        </span>
                    </div><!-- /input-group -->
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
                    <h3 class="search-title">Patient Search</h3>
                </div>
        
                <div class="col-lg-5">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search for Patient">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"> <span class="glyphicon glyphicon-search"></span> </button>
                        </span>
                    </div><!-- /input-group -->
                </div>
        
                {!! Form::close() !!}
            </div>
        </form>


    </div>
</div>

@stop