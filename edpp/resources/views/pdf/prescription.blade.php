<div align="center">
    <h3>Patient Prescription Sample</h3> 

    <p>Appointment ID: {{$ap->id}} </p>
    <p>Appointment Date: {{$ap->date}} </p>
    <p>Hospital: {{$ap->hospital->name}} </p>
    <p>Doctor: {{$ap->doctor->name}} </p>
    <p>Patient: {{$ap->patient->name}} </p>
    <p>Age: {{$ap->patient->age}} </p>
    <p>Blood Group: {{$ap->patient->bloodGroup->name}} </p>
    <p>Sex: {{$ap->patient->gender->name}} </p>
    <p style="white-space: pre-line" > Medicine: <br> {{$ap->prescription}} </p>

</div>