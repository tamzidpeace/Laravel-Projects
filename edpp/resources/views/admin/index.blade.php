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

                <div class="form-group col-md-5">
                    {{-- {!! Form::label('search', 'Search') !!} --}}
                    {!! Form::text('search' , null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-md-3">
                    {!! Form::submit('search', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}



                {{-- <div class="col-xs-6 col-md-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" id="txtSearch" />
                        <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </div>
                    </div>
                </div> --}}
            </div>
        </form>


    </div>
</div>

@stop