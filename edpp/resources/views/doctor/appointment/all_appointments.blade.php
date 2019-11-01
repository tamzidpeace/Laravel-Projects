@extends('layouts.doctor')


@section('content')

{{-- search form --}}
{!! Form::open(['action' => ['AdminController@hospitalSearch'], 'method' =>'get'])
!!}

<div>
    <h3 class="search-title">Appointments Search</h3>
</div>

{{-- testing input group --}}
<div class="col-sm-10">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Search by ID, Patient">
        <span class="input-group-btn">
            <button class="btn btn-primary" type="submit"> <span class="glyphicon glyphicon-search"></span> </button>
        </span>
    </div><!-- /input-group -->
</div>

{!! Form::close() !!} <br> <br>

<h2><strong>All Appointments</strong></h2>

<table class="table table-bordered">
    <tr class="info">
        <th>Appointment ID</th>
        <th>Hospital</th>
        <th>Patient</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Date</th>
        <th>Period</th>
        <th>Status</th>
    </tr>

    @foreach ($appointments as $pa)
    <tr>
        <td> {{$pa->id}} </td>
        <td> {{$pa->hospital->name}} </td>
        <td> {{$pa->patient_name}} </td>
        <td> {{$pa->patient_email}} </td>
        <td> {{$pa->patient_phone}} </td>
        <td> {{$pa->date}} </td>
        <td> {{$pa->period}} </td>
        <td> {{$pa->status}} </td>
    </tr>
    @endforeach

</table>

@endsection