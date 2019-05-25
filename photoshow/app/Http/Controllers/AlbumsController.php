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
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move('images/cover_images', $name);

        $album = new Album();

        $album->name = $request->name;
        $album->description = $request->description;
        $album->cover_image = $name;

        $album->save();

        return redirect('/album');
    }

    public function show($id)
    {
        $album = Album::find($id);
        $photos = $album->photos;
        $count = 1;
        return view('albums.view_album')
            ->with('album', $album)
            ->with('photos', $photos)
            ->with('count', $count);
    }

    public function edit($id)
    {
        $album = Album::find($id);
        return view('albums.edit')->with('album', $album)->with('id', $id);
    }

    public function update(Request $request, $id)
    {
        $album = Album::find($id);

        $album->name = $request->name;
        $album->description = $request->description;

        //delete previous image file
        if ($request->cover_image) {
            unlink('images/cover_images/' . $album->cover_image);

            //rename and move new image to cover_images directory
            $file = $request->file('cover_image');
            $name = time() . '_' . $file->getClientOriginalName();
            $file->move('images/cover_images', $name);

            $album->cover_image = $name;
        }

        $album->save();

        return redirect('/album');
        //return $album;
    }

    public function destroy($id)
    {
        $album = Album::find($id);
        unlink('images/cover_images/' . $album->cover_image);
        $album->delete();
        return redirect('/album');
    }
}
