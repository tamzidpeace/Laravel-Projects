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
</div>

@endsection