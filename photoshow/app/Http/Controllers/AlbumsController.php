<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        return view('albums.index');
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {

        $file = $request->file('cover_image');
        $name = time() . $file->getClientOriginalName();
        $file->move('images/cover_images', $name);

        $album = new Album();

        $album->name = $request->name;
        $album->description = $request->description;
        $album->cover_image = $name;

        $album->save();

        return redirect('/album');
    }
}
