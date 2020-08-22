<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Album;
use App\Track;

class WelcomeController extends Controller
{
    public function index()
    {
        $albums = Album::withCount('users')
        ->orderBy('users_count', 'desc')->get();

        $tracks = Track::withCount('users')
        ->orderBy('users_count', 'desc')->get();
        
        return view('welcome')->withAlbums($albums)->withTracks($tracks);
    }
}
