@extends('layouts.admin')

@section('content')

<h1>index</h1>

<div class="container">
    <div class="row">

        {{-- search bar --}}

        <form action="/admin/search" method="GET">
            <div class="row">


                {{-- search form --}}
                {!! Form::open(['action' => ['AdminController@search'], 'method' =>'get'])
                !!}

                <div>
                    <h3>Doctor Search</h3>
                </div>

                <div class="form-group col-md-5">
                    {{-- {!! Form::label('search', 'Search') !!} --}}
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