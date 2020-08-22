<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('artists', 'ArtistController' ,['except' => [ 'show']]);

    Route::put('/albums/{album}/like' , 'AlbumController@like')->name('albums.like');

    Route::resource('albums', 'AlbumController');

    Route::put('/tracks/{track}/like' , 'TrackController@like')->name('tracks.like');
    
    Route::resource('tracks', 'TrackController');

    Route::resource('genres', 'GenreController' ,['except' => [ 'show']]);
});

Route::get( '/{any}',function() {
    return view('errors.404');
})->where('any', '.*');