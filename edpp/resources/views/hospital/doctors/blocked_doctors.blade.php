@extends('layouts.hospital')

@section('content')
<h1>Blocked Doctors</h1>

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
                    {{-- unblock button --}}
                    {!! Form::open(['action' => ['HospitalController@unblock', $doctor->id], 'method' =>'patch'])
                    !!}
                    
                    <div class="form-group">
                        {!! Form::submit('Unblock Doctor', ['class' => 'btn btn-success']) !!}
                    </div>
                    
                    {!! Form::close() !!}
                </td>
            </tr>

            @endforeach
        </table>
    </div>
</div>
    
@endsection