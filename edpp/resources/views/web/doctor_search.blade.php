@extends('layouts.app')

@section('content')

{{-- Search bar portion start --}}
<div class="doctor-head">
    {{-- search bar  for hospital--}}

    <div class="row">
        {{-- search form --}}
        {!! Form::open(['action' => 'WebController@doctorSearch', 'method' =>'GET'])
        !!}

        {{--  input group --}}
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

{{-- search result --}}
<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="specialist">
                <div class="panel panel-info">
                    <div class="panel-heading" id="specialist-panel-heading">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Available Doctors</h3>
                    </div>
                    <div class="panel-body">

                        @foreach ($doctors as $doctor)
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="single-doctor">

                                    <div class="doctor-image">
                                        <img class="thumbnail single-doctor-image" src="/images/doctor_image/{{$doctor->photo}} "
                                            alt="">
                                    </div>

                                    <div class="doctor-othres">
                                        <a href="/edpp/doctor/details/{{$doctor->id}}">
                                            <h4>{{$doctor->name}}</h4>
                                        </a>
                                        <p id=""> Specialist: {{$doctor->specialist->name}} </p>
                                        <p> Chambers:
                                            @foreach ($doctor->hospitals as $chamber)
                                            {{$chamber->name}},
                                            @endforeach
                                        </p>
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