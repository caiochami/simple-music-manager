<?php

namespace App\Http\Controllers;

use App\Track;
use App\Genre;
use App\Artist;
use App\Album;
use Illuminate\Http\Request;
use Session;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tracks.index')->withTracks(Track::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tracks.create')
        ->withGenres(Genre::all())
        ->withArtists(Artist::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $genre =  Genre::find($request->genre);
        $album =  Album::find($request->album);
        $track = new Track;
        $track->fill($request->toArray());
        $track->genre()->associate($genre);
        $track->album()->associate($album);
        $track->save();

        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'Faixa ' . $track->title . ' cadastrada com sucesso!');
        return redirect()->route('tracks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function show(Track $track)
    {
        return view('tracks.show')->withTrack($track);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function edit(Track $track)
    {
        return view('tracks.edit')
        ->withGenres(Genre::all())
        ->withArtists(Artist::all())
        ->withTrack($track);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {
        $genre =  Genre::find($request->genre);
        $album =  Album::find($request->album);
       
        $track->fill($request->toArray());
        $track->genre()->associate($genre);
        $track->album()->associate($album);
        $track->save();

        Session::flash('alert-class', 'alert-info');
        Session::flash('message', 'Faixa ' . $track->title . ' modificado com sucesso!');
        return redirect()->route('tracks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Track  $track
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track)
    {
        $track->users()->detach();
        $track->delete();

        Session::flash('alert-class', 'alert-danger');
        Session::flash('message', 'Faixa musical ' . $track->name . ' removida com sucesso!');
        return redirect()->route('tracks.index');
    }

    public function like(Track $track)
    {
        auth()->user()->tracks()->toggle([$track->id]);        

        return response()->json($track->likedByUser())->setStatusCode(200);
    }
}
