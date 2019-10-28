@extends('layouts.app')


@section('content')



{{-- head image --}}
<div class="container">
    {{-- head image part --}}
    <div class="row">
        <div class="home-head-image">
            <img src="/images/web_image/1.jpg" alt="">
        </div>
    </div>
    {{-- icon part --}}
    <div class="row ddeh">
        <div class="col-md-offset-1 col-md-2 home-head-icon home-head-icon-1">
            <a href="/edpp/doctors"><img style="color:white;" class="head-icon"
                    src="/images/web_image/home_head_icon/doctor.png" alt=""></a>
            <a style="color:black;" href="/edpp/doctors">
                <h4>Doctor</h4>
            </a>
        </div>
        <div class="col-md-offset-1 col-md-2 home-head-icon home-head-icon-2">
            <a href="/edpp/hospitals"><img class="head-icon" src="/images/web_image/home_head_icon/hospital.png"
                    alt=""></a>
            <a style="color:black;" href="/edpp/hospitals">
                <h4>Hospital</h4>
            </a>
        </div>
        <div class="col-md-offset-1 col-md-2 home-head-icon home-head-icon-3">
            <a href="#"><img class="head-icon" src="/images/web_image/home_head_icon/blood-donation.png" alt=""></a>
            <a style="color:black;" href="#">
                <h4>Donation</h4>
            </a>
        </div>
        <div class="col-md-offset-1 col-md-2 home-head-icon home-head-icon-4">
            <a href="#"><img class="head-icon" src="/images/web_image/home_head_icon/emergency.png" alt=""></a>
            <a style="color:black;" href="#">
                <h4>Emergency</h4>
            </a>
        </div>
    </div>
    {{-- end of image part --}}

    {{-- line part --}}
    <div class="row">
        <div class="head-line" class="col-md-8 col-md-offset-2">
        </div>
    </div>

</div>



{{-- best services --}}
<div class="container">
    <div class="row text-center mt-5">
        <div class="col-md-12">
            <h1 style="color:#00838f;">Our Best Services</h1>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="panel no-border" style="height: 390px;">

                <div class="panel-heading " id="specialist-panel-heading">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Hospital Booking</h3>
                </div>

                <div class="panel-content">
                    <img class="img-fluid" src="/images/web_image/img/service.jpg" alt="img">
                    <p class="panel-text">A Patient can book hospital seat from home from available hospital. </p>
                    <a href="/edpp/hospitals" style="margin-right:10px;"
                        class="btn btn-success read-more pull-right">Book Hospital</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel no-border" style="height: 390px;">
                <div class="panel-heading " id="specialist-panel-heading">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Appointment Booking </h3>
                </div>
                <div class="panel-content">
                    <img class="img-fluid" src="/images/web_image/img/service1.jpg" alt="img">
                    <p class="panel-text">Users can book appointment as well as checkups for their required date and
                        time.
                    </p>
                    <a href="/edpp/doctors/" style="margin-right:10px;"
                        class="btn btn-success read-more pull-right">Book Appointment</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel no-border" style="height: 390px;">
                <div class="panel-heading " id="specialist-panel-heading">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Emergency Services</h3>
                </div>
                <div class="panel-content">
                    <img class="img-fluid" src="/images/web_image/img/service2.jpg" alt="img">
                    <p class="panel-text">Patients all prescriptions, medical reports will be
                        stored. test test test
                    </p>
                    <a href="#" style="margin-right:10px;" class="btn btn-success read-more pull-right">Get Emergency
                        Service</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="panel no-border" style="height: 390px;">
                <div class="panel-heading" id="specialist-panel-heading">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Donation</h3>
                </div>
                <div class="panel-content">
                    <img class="img-fluid" src="/images/web_image/img/service3.jpg" alt="img">
                    <p class="panel-text">User who is going to donate blood has to register himself by filling the
                        details.
                    </p>
                    <a href="/edpp/donation" style="margin-right:10px;"
                        class="btn btn-success read-more pull-right">Find Blood Donors</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel no-border" style="height: 390px;">
                <div class="panel-heading " id="specialist-panel-heading">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Medical Record</h3>
                </div>
                <div class="panel-content">
                    <img style="height: 245px;" class="img-fluid" src="/images/web_image/img/service4.jpg" alt="img">
                    <p class="panel-text">Patients all prescriptions, medical reports will be stored. test test test
                    </p>
                    <a href="" style="margin-right:10px;" class="btn btn-success read-more pull-right">Read
                        More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel no-border" style="height: 390px;">
                <div class="panel-heading " id="specialist-panel-heading">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Digital Prescription</h3>
                </div>
                <div class="panel-content">
                    <img class="img-fluid" src="/images/web_image/img/service5.jpg" alt="img">
                    {{-- <h5 class="panel-title">Digital Prescription</h5> --}}
                    <p class="panel-text">Patients all prescriptions, medical reports will be stored. test test test
                    </p>
                    <a href="#" style="margin-right:10px;" class="btn btn-success read-more pull-right">Read
                        More</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end of best service --}}

{{-- carousel start --}}
<div class="container">
    <div class="row text-center mt-5">
        <div class="col-md-12">
            <h1 style="color:#00838f;">Want to Join!</h1>
        </div>
    </div>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img class="" src="/images/web_image/img/sld1.jpg" alt="Los Angeles"
                    style="width:100%; height:520px; filter: brightness(80%);">

                <div class="carousel-caption d-none d-md-block">
                    <p style="color:#00838f;font-size:50px;font-weight:bold;">Join as a Patient</p>
                    <a href="/patient/registration" class="btn btn-success btn-lg read-more">Join Now</a>
                </div>
            </div>

            <div class="item">
                <img class="" src="/images/web_image/img/sld2.jpg" alt="Chicago"
                    style="width:100%; height:520px; filter: brightness(80%);">
                <div class="carousel-caption d-none d-md-block">
                    <p style="color:#00838f;font-size:50px;font-weight:bold;">Join as a Doctor</p>
                    <a href="/doctor/registration" class="btn btn-success btn-lg read-more">Join Now</a>
                </div>
            </div>

            <div class="item">
                <img class="" src="/images/web_image/img/sld3.jpg" alt="New york"
                    style="width:100%; height:520px; filter: brightness(80%);">
                <div class="carousel-caption d-none d-md-block">
                    <p style="color:#00838f;font-size:50px;font-weight:bold;">Join as a Hospital or Chamber</p>
                    <a href="/hospital/registration" class="btn btn-success btn-lg read-more">Join Now</a>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
{{-- carousel end --}}

{{-- about us  & health tips--}}

<div class="about container">
    <div class="row text-center">
        <div class="col-md-8 col-md-offset-2 health-tips">

            <div style="color:#fff; font-weight:bold;" class="panel-heading" id="specialist-panel-heading">
                <h3>Health Tips</h3>
            </div>

            <ul class="list-group">
                <li class="list-group-item">
                    <p>Dapibus ac facilisis in</p>
                </li>
                <li class="list-group-item">
                    <p>Cras sit amet nibh libero</p>
                </li>
                <li class="list-group-item">
                    <p>Cras sit amet nibh libero</p>
                </li>
            </ul>

        </div>
    </div>
</div>

<div class="row" style="margin-bottom:20px;">
    <div class="col-md-8 col-md-offset-2" style="text-align:center;">
        <h1 style="color:#00838f;">About</h1>
        <p style="margin:0px 10px; font-weight:bold;">Lorem Ipsum is simply dummy text of the printing and
            typesetting industry.
            Lorem
            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took
            a
            galley of type and scrambled it to make a type specimen book. It has survived not only five
            centuries,
            but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised
            in
            the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently
            with
            desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
    </div>
</div>
</div>

{{-- end of about us & health tips --}}



@endsection