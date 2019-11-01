@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">

        <div class="panel panel-info">
            <div class="panel-heading"><strong>Notification Details</strong></div>
            <div class="panel-body">
                <p>From: {{$noti->sender}}</p>
                <p>To: me</p>
                <p>Message: {{$noti->message}}</p>
                <p>Booking Form:
                    @if ($noti->file == null)
                    No file available.
                    @else
                    {!! Form::open(['action' => ['NotificationController@downloadForm', $noti->id],
                    'method' => 'get']) !!}
                    <div class="col-sm-2" style="margin-left:90px; margin-top: -35px;">
                        {!! Form::submit('Download', ['class' => 'form-control btn-info ']) !!}
                    </div>

                    {!! Form::close() !!}
                    @endif
                </p>

            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>

@endsection