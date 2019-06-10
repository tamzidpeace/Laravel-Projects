@extends('layouts.app')

@section('content')


{{-- Search bar portion start --}}
<div class="doctor-head">
    {{-- search bar  for hospital--}}

    <div class="row">
        {{-- search form --}}
        {!! Form::open(['action' => 'AdminController@doctorSearch', 'method' =>'GET'])
        !!}

        {{-- testing input group --}}
        <div class="doctor-search">
            <div class="input-group">
                <input style="font-weight:bold;" type="text" name="search" class="form-control"
                    placeholder="Search for Doctor">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"> <span style="font-weight:bold;"
                            class="">Search</span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>

        {!! Form::close() !!}
    </div>
</div>
{{-- end of search bar portion --}}


{{-- start of specialist section --}}
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="specialist">
                <div class="panel panel-info">
                    <div class="panel-heading" id="specialist-panel-heading">
                        <h3 style="font-weight:bold; color:white" class="panel-title">CHOOSE SPECIALITY TO FIND YOUR
                            DESIRED
                            SPECIALIST</h3>
                    </div>
                    <div class="panel-body">

                        @for ($i = 0; $i < count($specialists); $i++) <div class="col-md-4 list-group">
                            <a href=""><button style="font-weight:bold;" type="button" class="list-group-item">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                    {{$specialists[$i]->name}} </button></a>
                    </div>
                    @endfor

                </div>
            </div>
        </div>
    </div>

    {{-- sidebar --}}
    <div class="col-md-4">
        <div class="sidebar">
            <div class="panel panel-default">
                <div class="panel-heading" id="sidebar-title">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Sidebar</h3>
                </div>
                <div class="panel-body">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse mollitia aliquid officiis quasi
                        qui perferendis dignissimos commodi, quod dicta neque. Aliquid dolor fugit minus pariatur
                        sapiente. Reprehenderit placeat ipsam quas.</p>
                </div>
            </div>
        </div>
    </div> {{-- end of sidebar --}}
</div>
</div>
{{-- end of specialist section --}}

@endsection