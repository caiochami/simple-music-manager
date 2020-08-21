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
    Route::resource('albums', 'AlbumController');
    Route::resource('tracks', 'TrackController', ['except' => [ 'show']]);
    Route::resource('genres', 'GenreController' ,['except' => [ 'show']]);
    
});

Route::get( '/{any}',function() {
    return view('errors.404');
})->where('any', '.*');