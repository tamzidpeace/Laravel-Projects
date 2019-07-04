@extends('layouts.app')

@section('content')

{{-- Doctor Profile bar portion start --}}
<div class="doctor-profile-head">
    <div class="profile-pic">
        <img class="img-thumbnail doctor-image" src="/images/doctor_image/{{$doctor->photo}} " alt="">
    </div>
    <div class="others">
        <h1> {{$doctor->name}} </h1>
        <h4> {{$doctor->degree}} </h4>
        <h4> {{$doctor->specialist->name}} </h5>


    </div>
</div>
{{-- end of Doctor Profile bar portion --}}

{{-- doctor details section --}}

<div class="container">
    <div class="row">
        {{-- doctor about --}}
        <div class="col-md-6">
            <div class="doctor-about">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">About {{$doctor->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <p> Specialist: {{$doctor->specialist->name}} </p>
                        <p> Degree: {{$doctor->degree}} </p>
                        <p> Bio: {{$doctor->about}} </p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse mollitia aliquid officiis
                            quasi
                            qui perferendis dignissimos commodi, quod dicta neque. Aliquid dolor fugit minus pariatur
                            sapiente. Reprehenderit placeat ipsam quas.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- doctor chambers --}}
        <div class="col-md-6">
            <div class="doctor-chamber">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Chambers of {{$doctor->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach ($doctor->hospitals as $chamber)
                            <li class="list-group-item">
                                <a href="/edpp/hospital/details/{{$chamber->id}}">
                                    <p>{{$chamber->name}} </p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            <div class="appointment-booking">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Appointment Booking</h3>
                    </div>
                    <div class="panel-body">

                        <!-- appointment form -->

                        @php
                            
                            $champs = $doctor->hospitals->pluck('name', 'id')->all();
                            //$day = Day::pluck('name', 'id')->all();
                        @endphp

                        <div class="panel-body">


                            {!! Form::open(['action' => ['PatientController@bookAppointmentInfo', $doctor->id], 'method' => 'get']) !!}

                            <div class="form-group">
                                {!! Form::label('doctor', 'Doctor : ' . $doctor->name) !!}
                                
                            </div>

                            <div class="form-group">
                                {!! Form::label('hospital', 'Hospital') !!}
                                {!! Form::select('hospital', ['' => 'Choice Hospital'] + $champs , null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('period', 'Period') !!}
                                {!! Form::select('period', ['' => 'Choice Period'] + $period , null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('day', 'Day') !!}
                                {!! Form::select('day', ['' => 'Choice Day'] + $days , null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('date', 'Date') !!}
                                {!! Form::select('date', ['' => 'Choice Date(you must choice exact date of chosen day'] + $date , null, ['class' => 'form-control']) !!}
                            </div>

                            

                            {!! Form::submit('Check Availability', ['class' => 'form-control btn-primary']) !!}

                            {!! Form::close() !!}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end of sidebar --}}

    @endsection