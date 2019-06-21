@extends('layouts.doctor')

@section('content')
<h2>Update Your Working State</h2>
<br>
<div class="row">
    <div class="col-md-10">
        <div class="panel panel-primary">
            <div style="font-weight:bold;" class="panel-heading">Set Your Working State</div>
            <div class="panel-body">
                {!! Form::open(['action' => ['DoctorController@updateWorkingState', $ws->id], 'method' =>'PATCH'])
                !!}

                {!! Form::label('hospital', 'Hospital') !!}
                {!! Form::text('hospital',  $ws->hospital->name, ['class' => 'form-control' ,'disabled' => 'disabled'])
                !!}

                {!! Form::label('day', 'Day') !!}
                {!! Form::text('day', $ws->day->name, ['class' => 'form-control', 'disabled' => 'disabled'])
                !!}

                {!! Form::label('payment', 'Appointment Payment Amount(in taka)') !!}
                {!! Form::number('payment', $ws->payment, ['class' => 'form-control']) !!}

                <div style="margin-top:20px;" class="form-inline">
                    <div class="form-group">
                        {!! Form::label('morning', 'Morning') !!} <br>
                        {!! Form::number('morningS', $ws->m_visit_s, ['class' => 'form-control']) !!}
                        to
                        {!! Form::number('morningE', $ws->m_visit_e, ['class' => 'form-control']) !!}
                        <strong>Max Appointment</strong>
                        {!! Form::number('morningA', $ws->m_visit_amount, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div style="margin-top:20px;" class="form-inline">
                    <div class="form-group">
                        {!! Form::label('afternoon', 'Afternoon') !!} <br>
                        {!! Form::number('afternoonS', $ws->a_visit_s, ['class' => 'form-control']) !!}
                        to
                        {!! Form::number('afternoonE', $ws->a_visit_e, ['class' => 'form-control']) !!}
                        <strong>Max Appointment</strong>
                        {!! Form::number('afternoonA', $ws->a_visit_amount, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div style="margin-top:20px; margin-bottom:20px;" class="form-inline">
                    <div class="form-group">
                        {!! Form::label('evening', 'Evening') !!} <br>
                        {!! Form::number('eveningS', $ws->e_visit_s, ['class' => 'form-control']) !!}
                        to
                        {!! Form::number('eveningE', $ws->e_visit_e, ['class' => 'form-control']) !!}
                        <strong>Max Appointment</strong>
                        {!! Form::number('eveningA', $ws->a_visit_amount, ['class' => 'form-control']) !!}
                    </div>
                </div>

                {!! Form::submit('Update', ['class' => 'form-control btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection