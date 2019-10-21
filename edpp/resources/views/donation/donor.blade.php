@extends('layouts.app')

@section('content')


{{-- Search bar portion start --}}
<div class="doctor-head">
    {{-- search bar  for hospital--}}

    <div class="row">
        {{-- search form --}}
        {!! Form::open(['action' => 'DonationController@search', 'method' =>'GET'])
        !!}

        {{-- testing input group --}}
        <div class="doctor-search">
            <div class="input-group">
                <input style="font-weight:bold;" type="text" name="search" class="form-control"
                    placeholder="Search for Blood Donor">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"> <span style="font-weight:bold;"
                            class="">Search</span>
                    </button>
                </span>
            </div><!-- /input-group -->
        </div>

        {!! Form::close() !!}
    </div>
</div>
{{-- end of search bar portion --}}




{{-- start of specialist section --}}
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="specialist">
                <div class="panel panel-info">
                    <div class="panel-heading" id="specialist-panel-heading">
                        <h3 style="font-weight:bold; color:white" class="panel-title">Available  Donor</h3>
                    </div>
                   <div class="panel-body">
                     <div class="row">
                       @foreach($donors as $donor)
                       <div class="col-md-3 list-group">
                         <img class="img-thumbnail" src="/images/donor_image/{{$donor->photo}}" style="width:175px;height:130px;" alt="">
                       </div>
                       <div class="col-md-3 list-group">
                         <p style="font-family:sans-serif"> <b>{{$donor->name}}</b> </p>
                         <p style="font-family:sans-serif">Bloodgroup: {{$donor->Bloodgroup->name}}</p>
                         <p style="font-family:sans-serif">Phone: {{$donor->phone}}</p>
                         <p style="font-family:sans-serif">Address: {{$donor->address}}</p>
                       </div>
                       @endforeach
                     </div>

                   </div>

            </div>
        </div>
    </div>

    

    {{-- sidebar --}}
    <div class="col-md-4">
        <div class="sidebar">
            <div class="panel panel-default">
                <div class="panel-heading" id="sidebar-title">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Want to be a Blood Donor ?</h3>
                </div>
                <div class="panel-body">

                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse mollitia aliquid officiis quasi
                        qui perferendis dignissimos commodi, quod dicta neque. Aliquid dolor fugit minus pariatur
                        sapiente. Reprehenderit placeat ipsam quas.</p>
                        <a href="/edpp/donation/donorform" class="btn btn-success" role="button">Yes</a>
                        <a href="#" class="btn btn-danger" role="button">No</a>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="panel panel-default">
                <div class="panel-heading" id="sidebar-title">
                    <h3 style="font-weight:bold; color:white" class="panel-title">Advanced Search option</h3>
                </div>
                <div class="panel-body">

                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse mollitia aliquid officiis quasi
                        qui perferendis dignissimos commodi, quod dicta neque. Aliquid dolor fugit minus pariatur
                        sapiente. Reprehenderit placeat ipsam quas.</p>
                </div>
            </div>
        </div>
    </div> {{-- end of sidebar --}}
</div>
{{-- end of specialist section --}}
@endsection
