<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Season\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.season.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('season', 'SeasonController@index')->name('index');
    Route::get('season/add', 'SeasonController@create')->name('add');
    Route::post('season/store', 'SeasonController@store')->name('store');
    Route::get('season/edit/{id}', 'SeasonController@edit')->name('edit');
    Route::post('season/update', 'SeasonController@update')->name('update');
    Route::get('season/delete/{id}', 'SeasonController@destroy')->name('delete');
});



// Route::namespace($namespace)->prefix('admin')->middleware(['web'])->name('admin.')->group(function () {
//     Route::get('settings', 'SettingController@index')->name('setting.index');
//     Route::post('setting/store', 'SettingController@store')->name('setting.store');
//     Route::post('setting/update', 'SettingController@update')->name('setting.update');
// });


// Route::get('admin/category', function () {
//     return " wow your model working";
// });
