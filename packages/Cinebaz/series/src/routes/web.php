<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Series\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.series.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('series', 'SeriesController@index')->name('index');
    Route::get('series/add', 'SeriesController@create')->name('add');
    Route::post('series/store', 'SeriesController@store')->name('store');
    Route::get('series/edit/{id}', 'SeriesController@edit')->name('edit');
    Route::post('series/update', 'SeriesController@update')->name('update');
    Route::get('/series/delete/{id}', 'SeriesController@destroy')->name('delete');
});



// Route::namespace($namespace)->prefix('admin')->middleware(['web'])->name('admin.')->group(function () {
//     Route::get('settings', 'SettingController@index')->name('setting.index');
//     Route::post('setting/store', 'SettingController@store')->name('setting.store');
//     Route::post('setting/update', 'SettingController@update')->name('setting.update');
// });


// Route::get('admin/category', function () {
//     return " wow your model working";
// });
