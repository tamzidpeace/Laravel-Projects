@extends('layouts.app')

@section('content')
<div class="container">


    <div class="jumbotron">
        <h1 class="home">Welcome!</h1>
        <h3 class="home well">This Project is Now Under Development.</h3>
    </div>


    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="/hospital/registration">Hostpital Registation</a>
                    <a class="btn btn-primary" href="/doctor/registration">Doctor Registation</a>
                    <a class="btn btn-primary" href="/patient/registration">Patient Registation</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
