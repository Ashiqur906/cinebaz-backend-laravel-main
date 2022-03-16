<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Media\Http\Controllers';


Route::namespace($namespace)->prefix('admin')->name('admin.media.')->middleware(['web', 'auth:web', 'lang'])->group(function () {
    Route::get('medias', 'MediaController@index')->name('index');
    Route::get('media/add', 'MediaController@add')->name('add');
    Route::post('media/title', 'MediaController@title')->name('title.store');
    Route::get('media/{id}/details', 'MediaController@details')->name('details');
    Route::get('media/{id}/edit', 'MediaController@edit')->name('edit');
    Route::get('media/{id}/delete', 'MediaController@delete')->name('delete');
    Route::post('media/save', 'MediaController@store')->name('store');
    Route::get('series/get_session/{id}', 'MediaController@getSession')->name('get_session');

    Route::get('media/tranding', 'TrandingController@Index')->name('tranding');
    Route::get('media/tranding/create', 'TrandingController@Create')->name('tranding.add');
    Route::post('media/tranding/save', 'TrandingController@store')->name('tranding.store');
    Route::get('media/tranding/delete/{id}', 'TrandingController@Delete')->name('dlt.tranding');

    Route::get('media/top-ten', 'TopController@Index')->name('top');
    Route::get('media/top/create', 'TopController@Create')->name('top.add');
    Route::post('media/top/save', 'TopController@store')->name('top.store');
    Route::get('media/top/delete/{id}', 'TopController@Delete')->name('dlt.top');
});

Route::namespace($namespace)->middleware(['web', 'auth:web'])->group(function () {
    Route::post('dropzone/upload', 'DropzoneController@upload')->name('dropzone.upload');
    Route::get('dropzone/fetch', 'DropzoneController@fetch')->name('dropzone.fetch');
    Route::post('dropzone/delete', 'DropzoneController@delete')->name('dropzone.delete');
});


// Route::get('admin/media', function () {
//     dd(config('cz_media.lang'));
//     return " wow your model working";
// });
