<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Banner\Http\Controllers';


 //slider group list new
Route::namespace($namespace)->prefix('admin/slider')->name('admin.slider.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('/', 'BannerController@index')->name('index');
    Route::get('{id}/details', 'BannerController@details')->name('details');
    Route::get('add/', 'BannerController@add')->name('add');
    Route::get('{id}/edit', 'BannerController@edit')->name('edit');
    Route::get('details/{id}/add/', 'BannerController@details_add')->name('details.add');
    Route::get('details/{id}/edit', 'BannerController@details_edit')->name('details.edit');
    Route::post('save', 'BannerController@store')->name('save');
    Route::post('details/save', 'BannerController@store_details')->name('details.save');
    // Route::get('/slislidergroupder/{id}/delete', 'BannerController@deleteGroup')->name('slidergroup.delete');

});

