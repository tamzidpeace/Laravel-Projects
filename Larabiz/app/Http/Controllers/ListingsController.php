<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $listings = Listing::orderBy('created_at', 'desc')->paginate(2);

        return view('pages.custom_welcome')->with('listings', $listings);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'bio' => 'required',
        ]);

        $user_id = Auth::user()->id;
        $list = new Listing();

        $list->user_id = $user_id;
        $list->name = $request->name;
        $list->address = $request->address;
        $list->website = $request->website;
        $list->email = $request->email;
        $list->phone = $request->phone;
        $list->bio = $request->bio;
        $list->save();

        return redirect('home')->with('success', 'List Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = Listing::find($id);
        return view('pages.show')->with('id', $id)->with('list', $list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list = Listing::find($id);
        return view('pages.edit')->with('list', $list);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'bio' => 'required',
        ]);

        $list = Listing::find($id);

        $list->name = $request->name;
        $list->address = $request->address;
        $list->email = $request->email;
        $list->website = $request->website;
        $list->phone = $request->phone;
        $list->bio = $request->bio;

        $list->save();

        return redirect('/home')->with('success', 'List updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Listing::findOrFail($id)->delete();
        return back()->with('success', 'List item deleted!');
    }
}
