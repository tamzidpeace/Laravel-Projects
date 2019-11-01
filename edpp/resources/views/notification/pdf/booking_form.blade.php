<div class="row">
    <div class="col-md-offset-2 col-md-8 col-md-offset-2">

        <div class="panel panel-info" align="center">
            <div class="panel-heading"><strong>Hospital Booking Form Sample</strong></div>
            <div class="panel-body">
                <p>Hospital: {{$noti->sender}}</p>
                <p>Booking ID: {{$noti->file}}</p>
                <p>Patient Admit Date: {{$noti->booking->date}} </p>
                <p>Seat: {{$noti->booking->seat}} </p>
                <p>Patient: {{$noti->receiver}} </p>
                <p>Age: {{$noti->booking->patient->age}} </p>
                <p>Blood Group: {{$noti->booking->patient->bloodGroup->name}} </p>
                <p>Sex: {{$noti->booking->patient->gender->name}} </p>
                <p>Phone: {{$noti->booking->patient->phone}} </p>
                <p>Address: {{$noti->booking->patient->address}} </p>
            </div>
            <div class="panel-footer"></div>
        </div>
    </div>
</div>