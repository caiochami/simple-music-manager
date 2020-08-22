<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;
use App\Http\Requests\ArtistRequest;

use Session;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('artists.index')->withArtists(Artist::orderBy('name')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtistRequest $request)
    {
        
        Artist::create($request->toArray());
        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Artista ' . $request->name . ' cadastrado com sucesso!');
        return redirect()->route('artists.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit')->withArtist($artist);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(ArtistRequest $request, Artist $artist)
    {
        
        $artist->update($request->toArray());
        Session::flash('alert-class', 'alert-info');
        Session::flash('message', 'Artista ' . $request->name . ' modificado com sucesso!');
        return redirect()->route('artists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        Session::flash('alert-class', 'alert-danger');
        Session::flash('message', 'Artista ' . $artist->name . ' removido com sucesso!');
        return redirect()->route('artists.index');
    }
}
