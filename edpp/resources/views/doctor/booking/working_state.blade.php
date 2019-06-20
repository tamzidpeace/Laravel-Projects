@extends('layouts.doctor')

@section('content')

<h1>working state</h1>

<div class="row">
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div style="font-weight:bold;" class="panel-heading">Set Your Working State</div>
            <div class="panel-body">
                {!! Form::open(['action' => 'DoctorController@workingStateResult', 'method' =>'GET'])
                !!}

                {!! Form::label('hospital', 'Select Hospital') !!}
                {!! Form::select('hospital', [ '' => 'choice option'] + $hospitals, null, ['class' => 'form-control'])
                !!}

                {!! Form::label('day', 'Select Day') !!}
                {!! Form::select('day', [ '' => 'choice option'] + $days, null, ['class' => 'form-control'])
                !!}

                <div style="margin-top:20px;" class="form-inline">
                    <div class="form-group">
                        {!! Form::label('morning', 'Morning') !!} <br>
                        {!! Form::number('morningS', null, ['class' => 'form-control']) !!}
                        to
                        {!! Form::number('morningE', null, ['class' => 'form-control']) !!}
                        <strong>Max Appointment</strong>
                        {!! Form::number('morningA', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div style="margin-top:20px;" class="form-inline">
                    <div class="form-group">
                        {!! Form::label('afternoon', 'Afternoon') !!} <br>
                        {!! Form::number('afternoonS', null, ['class' => 'form-control']) !!}
                        to
                        {!! Form::number('afternoonE', null, ['class' => 'form-control']) !!}
                        <strong>Max Appointment</strong>
                        {!! Form::number('afternoonA', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div style="margin-top:20px; margin-bottom:20px;" class="form-inline">
                    <div class="form-group">
                        {!! Form::label('evening', 'Evening') !!} <br>
                        {!! Form::number('eveningS', null, ['class' => 'form-control']) !!}
                        to
                        {!! Form::number('eveningE', null, ['class' => 'form-control']) !!}
                        <strong>Max Appointment</strong>
                        {!! Form::number('eveningA', null, ['class' => 'form-control']) !!}
                    </div>
                </div>


                {{-- {{Form::checkbox('name', 'value')}} --}}

                {!! Form::submit('Submit', ['class' => 'form-control btn-primary']) !!}

                {{-- <span class="input-group-btn">
                    <button class="btn btn-primary btn-block" type="submit"> <span style="font-weight:bold;"
                            class="">Submit</span>
                    </button>
                </span> --}}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- this is from tajuddin  -->

@endsection