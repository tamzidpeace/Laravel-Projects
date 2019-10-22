@extends('layouts.app')

@section('content')

{{-- Search bar portion start --}}
<div class="doctor-head">
    {{-- search bar  for donor--}}

    <div class="row">
        {{-- search form --}}
        {!! Form::open(['action' => 'EmergencyController@emergencySearch', 'method' =>'GET'])
        !!}

        {{--  input group --}}
        <div class="doctor-search">
            <div class="input-group">
                <input style="font-weight:bold;" type="text" name="search" class="form-control"
                    placeholder="Search for Emergency Service by Hospital Name & Address.">
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

{{-- search result --}}
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="specialist">
                <div class="panel panel-info">
                    <div class="panel-heading" id="specialist-panel-heading">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Available Emergency Service</h3>
                    </div>
                    <div class="panel-body">


                        @if (count($es)<=0) <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h3> <strong>Oh snap!</strong> No Emergency Service Available. </h3>
                    </div>

                    @endif

                    @foreach ($es as $e)
                    <li class="list-group-item">
                        <div class="">
                            <img class="img-thumbnail hospital-image"
                                src="/images/es_image/{{$e->photo}} " alt="">
                        </div>

                        <div class="hospital-deatils">
                            <a href="/edpp/hospital/details/{{$e->id}}">
                                <h3> {{$e->name}} </h3>
                            </a>
                            <h4> Phone: {{$e->phone}} </h4>
                            <h4> Address: {{$e->address}} </h4>
                        </div>
                    </li>
                    @endforeach

                </div>


            </div>
        </div>
    </div>
</div>
</div>

@endsection