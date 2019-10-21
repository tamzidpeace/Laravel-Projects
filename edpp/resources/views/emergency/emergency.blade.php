@extends('layouts.app')
@section('content')

<div class="doctor-head">
    {{-- search bar for hospital--}}

    <div class="row">
        <h1 align="center" style="color:white;padding-top:20px;">Welcome To Emergency Service </h1>
    </div>
</div>

<div class="container-fluid">
  <p align="center" style="font-size:30px;margin-top:20px; color:#00838F;">Click Hospitals To Get Emergency Service <i class="glyphicon glyphicon-hand-down
" style="color:blue;"></i> </p>
</div>
<div class="container" style="margin-top:50px;">
 <div class="row">

   <div class="col-md-8" style="background-color:white;border:1px solid #D8D8D8;border-radius:2px;margin-bottom:10px;">
      @foreach($allhospitals as $hospital)
      <div class="row" style="padding:20px;background-color:white;">
        <div class="col-md-4">
         <img style="width:200px;height:70px;margin-top:20px;" src="{{'/images/hospital_image/'.$hospital->photo}}" alt="image">
        </div>
        <div class="col-md-8">
          <a href="" style="font-size:30px;font-style:Sans-serif; font-weight: bold;">{{$hospital->name}}</a>
          <p>{{$hospital->address}}</p>
        </div>
       </div>
       <hr>
       @endforeach
   </div>
   <div class="col-md-4">
     <div class="card" style="width:400px;border:1px solid white;background-color:white; border:1px solid #D8D8D8;">
        <div class="card-body">
          <h4 class="card-title" align="center" style="color:#2579A9;">Search Here</h4>
          <hr style="width:30%;border-top: 2px solid #2579A9;">
          <form action="/search" method="get">
            <input type="search" class="form-control text-center" name="search" placeholder="search">
            <button type="button" class="btn btn-primary btn-block">Search</button>
          </form>
         
        </div>
    </div>
   </div>
 </div>
</div>
@endsection
