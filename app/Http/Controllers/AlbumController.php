<?php

namespace App\Http\Controllers;

use App\Album;
use App\Artist;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;

use Session;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('albums.index')->withAlbums(Album::withCount('tracks')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create')->withArtists(Artist::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbumRequest $request)
    {   
        $artist = Artist::find($request->artist);
            
        $album =  new Album;
        $album->fill($request->toArray());
        $album->artist()->associate($artist);
        $album->save();   
        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Album ' . $album->title . ' cadastrado com sucesso!');
        return redirect()->route('albums.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return view('albums.show')->withAlbum($album);       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('albums.edit')->withAlbum($album)->withArtists(Artist::all());
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumRequest $request, Album $album)
    {
        $artist = Artist::find($request->artist);
        $album->fill($request->toArray());
        $album->artist()->associate($artist);
        $album->save();   
        Session::flash('alert-class', 'alert-info');
        Session::flash('message', 'Album ' . $request->name . ' modificado com sucesso!');
        return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        Session::flash('alert-class', 'alert-danger');
        Session::flash('message', 'Album ' . $album->title . ' removido com sucesso!');
        return redirect()->route('albums.index');
    }
}
