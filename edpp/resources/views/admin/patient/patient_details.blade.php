@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Patient Details</h1>
        <a style="margin-top:15px" class="btn btn-info" href="/admin/patients">Go Back</a>
    </div>

    <div style="margin-top:30px;" class="row">
        <div class="col-sm-6 panel-group">

            <div class="panel panel-success">

                <div class="panel-heading">
                    <img class="img-thumbnail" style="height:120px; width:120px;"
                        src="/images/patient_image/{{$patient->photo}}" alt="">
                </div>

                <div class="panel-body">
                    <h4>Name: {{$patient->name}} </h4>
                    <h4>Email: {{$patient->email}} </h4>
                    <h4>Phone: {{$patient->phone}}</h4>
                    <h4>Address: {{$patient->address}} </h4>
                    <h4>Status: {{$patient->status}} </h4>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection