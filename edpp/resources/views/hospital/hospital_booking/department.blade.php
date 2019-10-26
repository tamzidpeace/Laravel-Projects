@extends('layouts.hospital')


@section('content')

<h1>Handle Hospital Department and Seat</h1>

{{-- add department form --}}
<div class="row specialist">
    <div class="col-md-6">
        {!! Form::open(['method' => 'POST', 'action' => 'HospitalBookingController@addDepartment']) !!}

        <div class="form-group">
            {!! Form::label('name', 'New Department Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Add', ['class' => 'btn btn-success btn-block']) !!}
        </div>

        {!! Form::close() !!}
    </div>

    {{-- Seat amount form --}}
    <div class="col-md-offset-1 col-md-4">

        {!! Form::open(['method' => 'patch', 'action' => 'HospitalBookingController@seatAmount']) !!}

        <div class="form-group">
            {!! Form::label('amount', 'Enter total number of seat of hospital') !!}
            {!! Form::number('amount', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-success btn-block']) !!}
        </div>

        {!! Form::close() !!}

        

        <p><strong>Total Seat: {{$ts}} </strong></p>
        <p><strong>Available Seat: {{$as}}</strong></p>
        <p><strong>Booked Seat: {{$bs}}</strong></p>

    </div>
</div>

<div class="row">
    <div class="col-md-6">

        <table class="table table-bordered">
            <tr class="info">
                <th>Serial</th>
                <th>Name</th>
                <th>Action</th>
                <th>Action</th>
            </tr>

            @php
            $id = 1;
            @endphp

            @foreach ($hos as $h)
            <tr>
                <td> {{$id++}} </td>
                <td> <strong>{{ $h->department_name }}</strong></td>

                <td>
                    {!! Form::open(['action' => ['HospitalBookingController@editDepartment', $h->id], 'method' =>
                    'get']) !!}

                    {!! Form::submit('EDIT', ['class' => 'form-control btn-info']) !!}

                    {!! Form::close() !!}
                </td>

                <td>
                    {{-- remove button --}}
                    {!! Form::open(['action' => ['HospitalBookingController@removeDepartment', $h->id], 'method'
                    =>'delete'])
                    !!}

                    <div class="form-group">
                        {!! Form::submit('Remove', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                    {!! Form::close() !!}
                </td>

            </tr>
            @endforeach

        </table>

    </div>
</div>

@endsection