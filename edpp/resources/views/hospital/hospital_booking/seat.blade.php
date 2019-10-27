@extends('layouts.hospital')

@section('content')

<h1>Hospital Seat Manage</h1> <br>

<div class="row">


    {{-- Seat manage form --}}
    <div class="col-md-5">

        <div class="panel panel-info">
            <div class="panel-heading"><strong>Update Hospital Seat Information</strong></div>
            <div class="panel-body">

                {!! Form::open(['method' => 'patch', 'action' => 'HospitalBookingController@seatManage']) !!}

                <div class="form-group">
                    {!! Form::label('general', 'General Seats Number') !!}
                    {!! Form::number('general', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cost_gen', 'General Seats Cost') !!}
                    {!! Form::number('cost_gen', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cabin_ac', 'AC Cabin Seats Number') !!}
                    {!! Form::number('cabin_ac', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cost_ac', 'AC Cabin Seats Cost') !!}
                    {!! Form::number('cost_ac', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cabin_nac', 'Non-AC Cabin Seats Number') !!}
                    {!! Form::number('cabin_nac', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('cost_nac', 'Non-AC Cabin Seats Cost') !!}
                    {!! Form::number('cost_nac', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-success btn-block']) !!}
                </div>

                {!! Form::close() !!}

            </div>
            <div class="panel-footer"></div>
        </div>

    </div>

    <div class="col-md-offset-1 col-md-5">



        <div class="panel panel-info">
            <div class="panel-heading"><strong>Hospital Seat Information</strong></div>
            <div class="panel-body">
                <p><Strong>Total General Seat: {{$hs->general_total}} </Strong> </p>
                <p><Strong>General Seat Available: {{$hs->general_avail}}</Strong></p>
                <p><Strong>General Seat Booked: {{$hs->general_booked}}</Strong></p>
                <p><Strong>General Seat Cost: {{$hs->cost_gen}}</Strong></p>
                <br>
                <p><Strong>Total Cabin(AC) Seat: {{$hs->cabin_ac_total}}</Strong> </p>
                <p><Strong>Cabin(AC) Seat Available: {{$hs->cabin_ac_avail}}</Strong></p>
                <p><Strong>Cabin(AC) Seat Booked: {{$hs->cabin_ac_booked}}</Strong></p>
                <p><Strong>Cabin(AC) Seat Cost: {{$hs->cost_ac}}</Strong></p>
                <br>
                <p><Strong>Total Cabin(Non-AC) Seat: {{$hs->cabin_nac_total}}</Strong> </p>
                <p><Strong>Cabin(Non-AC) Seat Available: {{$hs->cabin_nac_avail}}</Strong></p>
                <p><Strong>Cabin(Non-AC) Seat Booked: {{$hs->cabin_nac_booked}}</Strong></p>
                <p><Strong>Cabin(Non-AC) Seat Cost: {{$hs->cost_nac}}</Strong></p>
                <br>
            </div>
            <div class="panel-footer"></div>
        </div>


    </div>

</div>




@endsection