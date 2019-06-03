@extends('layouts.hospital')

@section('content')
<h1>Registered Doctors</h1>

<div class="container">
    <div class="row">
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{$doctor->name}}
                <td>{{$doctor->phone}}</td>
                <td>
                    {{-- block button --}}
                    {!! Form::open(['action' => ['HospitalController@block', $doctor->id], 'method' =>'patch'])
                    !!}
                    
                    <div class="form-group">
                        {!! Form::submit('Block Doctor', ['class' => 'btn btn-info']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</div>

@endsection