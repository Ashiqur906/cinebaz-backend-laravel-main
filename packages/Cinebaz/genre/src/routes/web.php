<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Genre\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.genre.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('genres', 'GenreController@index')->name('all');
    Route::get('genre/add', 'GenreController@add')->name('add');
    Route::get('genre/{id}/edit', 'GenreController@edit')->name('edit');
    Route::post('genre/save', 'GenreController@store')->name('store');
});

Route::namespace($namespace)->middleware(['web', 'auth:web'])->group(function () {
    Route::get('getslug', 'GenreController@getslug')->name('getslug');
});
Route::namespace($namespace)->middleware(['web'])->group(function () {
    Route::get('genre/{slug}', 'GenreController@webview')->name('webview');
});


// Route::get('admin/genre', function () {
//     return " wow your model working";
// });
