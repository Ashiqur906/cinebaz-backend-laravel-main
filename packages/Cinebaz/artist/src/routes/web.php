<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Artist\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.artist.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('artist', 'ArtistController@index')->name('index');
    Route::get('artist/create', 'ArtistController@create')->name('create');
    Route::post('artist/store', 'ArtistController@store')->name('store');
    Route::get('artist/edit/{slug}', 'ArtistController@edit')->name('edit');
    Route::post('artist/update/{slug}', 'ArtistController@update')->name('update');
    Route::get('/artist/delete/{slug}', 'ArtistController@destroy')->name('delete');
    Route::get('/status/{slug}', 'ArtistController@status')->name('status');
    Route::get('getslugs', 'ArtistController@getslug')->name('getslugs');
    Route::get('occupation', 'ArtistController@occupationIndex')->name('occupation');
    Route::get('occupation/store', 'ArtistController@occupationStore')->name('occupation-store');
    Route::get('occupation/update/{id}', 'ArtistController@occupationUpdate')->name('occupation-update');
    Route::get('occupation/delete/{id}', 'ArtistController@occupationDestroy')->name('occupation-destroy');

}); 