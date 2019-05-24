<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        $count = 1;
        return view('albums.index')->with('albums', $albums)->with('count', $count);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {

        $file = $request->file('cover_image');
        $name = time() . '_'. $file->getClientOriginalName();
        $file->move('images/cover_images', $name);

        $album = new Album();

        $album->name = $request->name;
        $album->description = $request->description;
        $album->cover_image = $name;

        $album->save();

        return redirect('/album');
    }
}
