@extends('layouts.admin')


@section('content')

<div class="col-md-10">

  <table class="table table-bordered">
    <tr class="info">
      <th> Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Message</th>
      <th>Submitted</th>
      <th>Response</th>
    </tr>
  @foreach($contacts as $contact)
  <tr>
    <td>{{$contact->name}}</td>
    <td>{{$contact->email}}</td>
    <td>{{$contact->phone}}</td>
    <td>{{$contact->message}}</td>
    <td>{{$contact->created_at->diffForHumans()}}</td>
    <td>
      <a class="btn btn-info btn-block" href="#"> Reply </a>
    </td>
  </tr>
  @endforeach
  </table>



</div>


@endsection
