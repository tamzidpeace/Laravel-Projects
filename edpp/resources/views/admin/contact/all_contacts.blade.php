@extends('layouts.admin')


@section('content')

<div class="col-md-10">

  <table class="table table-bordered">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Message</th>
      <th>Submitted</th>
    </tr>
  @foreach($contacts as $contact)
  <tr>
    <td>{{$contact->name}}</td>
    <td>{{$contact->email}}</td>
    <td>{{$contact->phone}}</td>
    <td>{{$contact->message}}</td>
    <td>{{$contact->created_at->diffForHumans()}}</td>
  </tr>
  @endforeach
  </table>



</div>


@endsection
