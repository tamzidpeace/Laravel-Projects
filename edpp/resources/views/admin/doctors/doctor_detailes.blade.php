@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Doctor Details</h1>
        <a style="margin-top:15px" class="btn btn-info" href="/admin/doctors">Go Back</a>
    </div>

    <div style="margin-top:30px;" class="row">
        <div class="col-sm-6 panel-group">

            <div class="panel panel-success">

                <div class="panel-heading">
                    <img class="img-thumbnail" style="height:120px; width:120px;" src="/images/doctor_image/{{$doctor->photo}}" alt="">
                </div>

                <div class="panel-body">
                    <h4>Name: {{$doctor->name}} </h4>
                    <h4>Specialist: {{$doctor->specialist->name}} </h4>
                    <h4>Email: {{$doctor->email}} </h4>
                    <h4>Phone: {{$doctor->phone}}</h4>
                    <h4>Address: {{$doctor->address}} </h4>
                    <h4>Status: {{$doctor->status}} </h4>
                </div>
            </div>

        </div>
    </div>
    
</div>

@endsection