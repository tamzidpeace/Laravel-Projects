@extends('layouts.app')

@section('content')

{{-- Search bar portion start --}}
<div class="doctor-head">
    {{-- search bar  for donor--}}

    <div class="row">
        {{-- search form --}}
        {!! Form::open(['action' => 'DonationController@donorSearch', 'method' =>'GET'])
        !!}

        {{--  input group --}}
        <div class="doctor-search">
            <div class="input-group">
                <input style="font-weight:bold;" type="text" name="search" class="form-control"
                    placeholder="Search for Doctor by Blood Group & Address.">
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
                        <h3 style="font-weight:bold; color:white" class="panel-title">Available Dnonors</h3>
                    </div>
                    <div class="panel-body">


                        @if (count($donors)<=0) <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h3> <strong>Oh snap!</strong> No Donor Available. </h3>
                    </div>

                    @endif

                    @foreach ($donors as $donor)
                    <ul class="list-group">
                        <li class="list-group-item" style="height:170px;">
                            <div class="single-doctor">

                                <div class="doctor-image">
                                    <img class="thumbnail single-doctor-image" img class="img-thumbnail"
                                        src="/images/donor_image/{{$donor->photo}}" style="width:175px;height:130px;"
                                        alt="">
                                </div>

                                <div class="doctor-othres" style="margin-left:190px;">
                                    <h4>Name: {{$donor->name}}</h4>
                                    <h4>Phone: {{$donor->phone}}</h4>
                                    <h4>Address: {{$donor->address}}</h4>
                                    <h4>Blood Group: {{$donor->bloodGroup->name}}</h4>

                                </div>

                            </div>
                        </li>
                    </ul>
                    @endforeach

                </div>


            </div>
        </div>
    </div>
</div>
</div>

@endsection