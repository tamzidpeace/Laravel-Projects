@extends('layouts.app')

@section('content')

{{-- hospital Profile bar portion start --}}
<div class="hospital-profile">
    <h1> {{$hospital->name}} </h1>
    <h3> {{$hospital->address}} </h4>
</div>
{{-- end of hospital Profile bar portion --}}

{{-- image and details part --}}
<div class="container">
    {{-- hospital image --}}
    <div class="row">
        <div class="col-md-offset-2 col-md-8">

            <div class="panel panel-default hospital-img-panel">
                <!-- Default panel contents -->

                <div class="panel-body hospital-img-panel-body">
                    <img class="single-hospital-image thumbnail img-responsive"
                        src="/images/hospital_image/{{$hospital->photo}}" alt="">
                </div>
            </div>



        </div>
    </div> {{-- end of image part--}}

    {{-- details part --}}
    <div class="row">

        {{-- About --}}
        <div class="col-md-4">
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">About</h3>
                    </div>
                    <div class="panel-body">
                        <p> {{$hospital->about}} </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of about --}}

        {{--  hospital doctors--}}
        <div class="col-md-4">
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Doctors</h3>
                    </div>
                    <div class="panel-body">

                        <ul class="list-group">
                            @foreach ($hospital->doctors as $doctor)
                            <li class="list-group-item">
                                <a href="/edpp/doctor/details/{{$doctor->id}}">{{$doctor->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of hospital doctors --}}

        {{-- hospital contact --}}
        <div class="col-md-4">
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Contact</h3>
                    </div>
                    <div class="panel-body">
                        <p>Email: <small>{{$hospital->email}} </small> </p>
                        <p>Phone: <small>{{$hospital->phone}} </small></p>
                        <p>Address: <small>{{$hospital->address}} </small></p>
                    </div>
                </div>
            </div>
        </div>
        {{-- end of hospital contact --}}
    </div>

    {{-- hospital Booking --}}


    <div class="row">
        @if (!Auth::guest())

        <div class="col-md-offset-2 col-md-8">

            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Book Hospital</h3>
                    </div>

                    <div class="panel-body">
                        <h3>Book Hospital Seat</h3>

                        {!! Form::open(['method' => 'get', 'action' =>
                        ['HospitalBookingController@checkSeatAvailability', $hospital->id]])
                        !!}

                        <div class="form-group">
                            {!! Form::label('department', 'Department') !!}
                            {!! Form::select('department', ['' => 'Select Department'] + $departments , null, ['class'
                            =>
                            'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('seat', 'Seat') !!}
                            {!! Form::select('seat', ['' => 'Select Seat'] + $seats , null, ['class' =>
                            'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('date', 'Date') !!}
                            {!! Form::date('date', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group feedback-btn">
                            {!! Form::submit('Check Availability', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>

                        {!! Form::close() !!}



                    </div>


                </div>
            </div>


        </div>
        @endif

    </div>


    {{-- end of hospital booking --}}

    {{-- review --}}

    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            @if (!Auth::guest())
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Feedback</h3>
                    </div>

                    <div class="panel-body">
                        <h3>Give Us Your Feedback</h3>

                        {!! Form::open(['method' => 'POST', 'action' => ['FeedBackController@hospitalFeedback',
                        $hospital->id]]) !!}

                        <div class="form-group">
                            {!! Form::label('feedback', 'Feedback') !!}
                            {!! Form::textarea('feedback', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group feedback-btn">
                            {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>

                        {!! Form::close() !!}

                        {{-- feedbacks --}}

                        @if (!Auth::guest())

                        @foreach ($all_feedback as $fd)
                        <div style="margin-top:30px; background-color:lightblue; border-radius:5px;">
                            <p>
                                <h5>{{$fd->name}}</h5>
                            </p>
                            <p>{{$fd->feedback}}</p>
                            <p>
                                <h6>{{$fd->created_at}}</h6>
                            </p>
                        </div>
                        @endforeach

                        @endif

                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection