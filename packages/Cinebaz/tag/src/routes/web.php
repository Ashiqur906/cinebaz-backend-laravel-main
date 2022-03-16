<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Tag\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.tag.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('tag', 'TagController@index')->name('index');
    Route::get('tag/add', 'TagController@create')->name('add');
    Route::post('tag/store', 'TagController@store')->name('store');
    Route::get('tag/edit/{id}', 'TagController@edit')->name('edit');
    Route::post('tag/update', 'TagController@update')->name('update');
    Route::get('/tag/delete/{id}', 'TagController@destroy')->name('delete');
});
