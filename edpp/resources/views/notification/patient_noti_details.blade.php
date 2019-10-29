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
                <p>File: 
                    @if ($noti->file == null)
                        No file available.
                    @else
                    <button class="btn btn-info" type="submit">Download</button>
                    @endif 
                </p>

            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>

@endsection