@extends('layouts.doctor')

@section('content')

<h1>working state</h1>

<div class="row">
    <div class="col-md-10">
        <div class="panel panel-default">
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
                        {!! Form::label('morning', 'Morning') !!}
                        {!! Form::time('morningS', null, ['class' => 'form-control']) !!}
                        to
                        {!! Form::time('morningE', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div style="margin-top:20px;" class="form-inline">
                    <div class="form-group">
                        {!! Form::label('afternoon', 'Afternoon') !!}
                        {!! Form::time('afternoonS', null, ['class' => 'form-control']) !!}
                        to
                        {!! Form::time('afternoonE', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div style="margin-top:20px; margin-bottom:20px;" class="form-inline">
                    <div class="form-group">
                        {!! Form::label('evening', 'Evening') !!}
                        {!! Form::time('eveningS', null, ['class' => 'form-control']) !!}
                        to
                        {!! Form::time('eveningE', null, ['class' => 'form-control']) !!}
                    </div>
                </div>


                {{-- {{Form::checkbox('name', 'value')}} --}}

                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"> <span style="font-weight:bold;"
                            class="">Search</span>
                    </button>
                </span>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- this is from tajuddin  -->

@endsection
