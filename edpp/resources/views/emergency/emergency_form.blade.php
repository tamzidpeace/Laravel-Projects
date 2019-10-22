@extends('layouts.app')

@section('content')

{{-- Top bar portion start --}}
<div class="contact-head">
    {{-- contact bar  for hospital--}}
    <div class="contact">
        <h1>Emergency</h1>
        <h3>Fill-up the Form Below to Serve Emergency Service</h3>
    </div>
</div>
{{-- end of top bar portion --}}


<div class="container">
    <div class="row">
        {{-- contact body --}}

        {{-- report form --}}

        <div class="col-md-8">
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Donation Form</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['method' => 'POST', 'action' => 'EmergencyController@emergencyRegistration',
                        'files'=> true]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name', $hospital->name, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Contact Number') !!}
                            {!! Form::number('phone' , $hospital->phone, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email' , $hospital->email, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address' , $hospital->address, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('photo', 'Photo') !!}
                            {!! Form::file('photo' , null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('about', 'About') !!}
                            {!! Form::textarea('about' , null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

        {{-- our address --}}
        <div class="col-md-4">
            <div class="sidebar">
                <div class="panel panel-default">
                    <div class="panel-heading" id="sidebar-title">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Phone-Address</h3>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse mollitia aliquid officiis
                            quasi
                            qui perferendis dignissimos commodi, quod dicta neque. Aliquid dolor fugit minus pariatur
                            sapiente. Reprehenderit placeat ipsam quas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection