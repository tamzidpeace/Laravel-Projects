@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-md-offset-1 col-md-10 col-md-offset-1">

        <h1><strong>Notifications</strong></h1> <br>

        <table class="table table-bordered">
            <tr class="info">
                <th>Serial</th>
                <th>Sent By</th>
                <th>message</th>
                <th>Received</th>
                <th>File</th>
                <th>Action</th>


            </tr>

            @php
            $serial = 1;
            @endphp

            @foreach ($notifications as $ns)
            <tr @if ($ns->status == 'unseen')
                class="danger"
                @endif >
                <td> {{$serial++}} </td>
                <td> {{$ns->sender}} </td>
                <td> {{$ns->message}} </td>
                <td> {{$ns->created_at->diffForHumans()}}</td>
                <td>
                    @if ($ns->file == null)
                    None
                    @else

                    {!! Form::open(['action' => ['NotificationController@downloadForm', $ns->id],
                    'method' => 'get']) !!}

                    {!! Form::submit('Download', ['class' => 'form-control btn-info btn-block']) !!}

                    {!! Form::close() !!}

                    @endif
                </td>
                <td>
                    {!! Form::open(['action' => ['NotificationController@patientNotificationDetails', $ns->id],
                    'method' => 'patch']) !!}

                    {!! Form::submit('Details', ['class' => 'form-control btn-info btn-block']) !!}

                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach

        </table>


    </div>
</div>

@endsection