@extends('layouts.hospital')


@section('content')

<h1>Handle Hospital Department</h1>

<div class="row specialist">
    <div class="col-md-8">
        {!! Form::open(['method' => 'POST', 'action' => 'HospitalBookingController@addDepartment']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Department Name') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('Add', ['class' => 'btn btn-primary btn-block']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>

<div class="row">
    <div class="col-md-10">

        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <th>Edit Department</th>
                <th>Remove Department</th>
            </tr>

            @foreach ($hos as $h)
            <tr>
                <td>{{ $h->department_name }}</td>

                <td>
                    {{-- edit button --}}
                    {!! Form::open(['action' => ['HospitalBookingController@editDepartment', $h->id], 'method' =>'patch'])
                    !!}

                    <div class="form-group">
                        {!! Form::submit('Edit', ['class' => 'btn btn-info']) !!}
                    </div>

                    {!! Form::close() !!}
                </td>

                <td>
                    {{-- remove button --}}
                    {!! Form::open(['action' => ['HospitalBookingController@removeDepartment', $h->id], 'method' =>'delete'])
                    !!}

                    <div class="form-group">
                        {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
                    </div>

                    {!! Form::close() !!}
                </td>

            </tr>
            @endforeach

        </table>

    </div>
</div>

@endsection