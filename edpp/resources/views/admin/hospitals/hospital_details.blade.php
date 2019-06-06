@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Hospital Details</h1>
        <a style="margin-top:15px" class="btn btn-info" href="/admin/hospitals">Go Back</a>
    </div>

    <div style="margin-top:30px;" class="row">
        <div class="col-sm-6 panel-group">

            <div class="panel panel-success">

                <div class="panel-heading">
                    <img class="img-thumbnail" style="height:120px; width:120px;"
                        src="/images/hospital_image/{{$hospital->photo}}" alt="">
                </div>

                <div class="panel-body">
                    <h4>Name: {{$hospital->name}} </h4>
                    <h4>Email: {{$hospital->email}} </h4>
                    <h4>Phone: {{$hospital->phone}}</h4>
                    <h4>Address: {{$hospital->address}} </h4>
                    <h4>Status: {{$hospital->status}} </h4>
                    <h4>About: {{$hospital->about}}</h4>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection