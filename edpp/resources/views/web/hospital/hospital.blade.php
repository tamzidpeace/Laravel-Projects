@extends('layouts.app')

@section('content')

{{-- Search bar portion start --}}
<div class="doctor-head">
    {{-- search bar for hospital--}}

    <div class="row">
        {{-- search form --}}
        {!! Form::open(['action' => 'WebController@doctorSearch', 'method' =>'GET'])
        !!}

        {{-- testing input group --}}
        <div class="doctor-search">
            <div class="input-group">
                <input style="font-weight:bold;" type="text" name="search" class="form-control"
                    placeholder="Search for Hospital">
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

{{-- start of hospital list section --}}
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-info hospital-panel">
                <div class="panel-heading" id="specialist-panel-heading">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Available Hospitals</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">

                        @if ((count($hospitals) <= 0)) <li class="list-group-item">
                            <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h3> <strong>Oh snap!</strong> No Hospital Available. </h3>
                                </li>


                                @else
                                @foreach ($hospitals as $hospital)
                                <li class="list-group-item">
                                    <div class="">
                                        <img class="img-thumbnail hospital-image"
                                            src="/images/hospital_image/{{$hospital->photo}} " alt="">
                                    </div>

                                    <div class="hospital-deatils">
                                        <a href="#">
                                            <h3> {{$hospital->name}} </h3>
                                        </a>
                                        <h4> Phone: {{$hospital->phone}} </h4>
                                        <h4> Address: {{$hospital->address}} </h4>
                                    </div>
                                </li>
                                @endforeach

                                {{ $hospitals->links() }}

                                @endif
                    </ul>


                </div>
            </div> {{--end of hospital list section--}}

        </div>


        {{-- sidebar --}}
        <div class="col-md-4">
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Sidebar</h3>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse mollitia aliquid officiis
                            quasi
                            qui perferendis dignissimos commodi, quod dicta neque. Aliquid dolor fugit minus pariatur
                            sapiente. Reprehenderit placeat ipsam quas.</p>
                    </div>
                </div>
            </div>
        </div> {{-- end of sidebar --}}
    </div>
    {{-- end of hospital section --}}
</div>

@endsection