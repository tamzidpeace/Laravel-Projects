@extends('layouts.admin')

@section('content')

<h1>Requests</h1>


<div class="container">
    <div class="row">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Accept</th>
                    <th>Reject</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)

                <tr>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->address}}</td>
                    <td>
                        {{-- accept button --}}
                        {!! Form::open(['action' => ['AdminController@accept', $hospital->id], 'method' =>'patch']) !!}

                        <div class="form-group">
                            {!! Form::submit('Accept Request', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>

                    {{-- reject button --}}
                    <td>
                        {!! Form::open(['action' => ['AdminController@reject', $hospital->id], 'method' =>'delete']) !!}

                        <div class="form-group">
                            {!! Form::submit('Reject it', ['class' => 'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
</div>


@stop