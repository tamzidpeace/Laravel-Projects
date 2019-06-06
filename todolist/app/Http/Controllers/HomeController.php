<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function mail()
    {
        $user = Auth::user();


        $name = 'Krunal';
        //Mail::to('krunal@appdividend.com')->send(new SendMailable($name));
        Mail::to('tamjedpeace@gmail.com')->send(new SendMailable($name));

        //return view('name')->with('name', $name);
        return 'email send';
    }
}
