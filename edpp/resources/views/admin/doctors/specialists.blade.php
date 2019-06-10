@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <h1>Specialists</h1>
    </div>

    {{-- add item --}}
    <div class="row specialist">
        <div class="col-md-8">
            {!! Form::open(['method' => 'POST', 'action' => 'AdminDoctorController@addNewSpecialistType']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Specialist Type') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Add', ['class' => 'btn btn-primary btn-block']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    {{-- list item --}}

    <div class="row specialist-list">
        <div class="col-md-8">
            <h3>All Specialists Type List</h3>
            <table class="table table-hover">
                <tr class="info">
                    <th>ID</th>
                    <th>Specialist in</th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>

                @foreach ($specialists as $specialist)
                <tr>
                    <td> {{$specialist->id}} </td>
                    <td> {{$specialist->name}} </td>
                    <td>

                        {{-- update button --}}
                        <a href="/admin/doctor/specialist/edit/{{$specialist->id}}" class="btn btn-info">Update</a>

                    </td>
                    <td>
                        {{-- remove button --}}
                        {!! Form::open(['action' => ['AdminDoctorController@removeSpecialistItem', $specialist->id],
                        'method' =>'delete'])
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

</div>

@endsection