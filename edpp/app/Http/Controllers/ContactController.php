<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;

class ContactController extends Controller
{
  public function index()
  {
   $contacts=Contact::all();
   return view('admin.contact.all_contacts',compact('contacts'));
  }


    public function store(Request  $request)
    {
     $this->validate($request, ['name' => 'required',
     'message'=>'required',
   ]);

     $contact= new Contact;
     $contact->name= $request->name;
     $contact->email= $request->email;
     $contact->phone= $request->phone;
     $contact->message= $request->message;
     $contact->save();
     return back()->with('success','Your Report Submitted Succesfully!');
    }
}
