<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Category\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.category.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('category', 'CategoryController@index')->name('index');
    Route::get('category/add', 'CategoryController@create')->name('add');
    Route::post('category/store', 'CategoryController@store')->name('store');
    Route::get('category/edit/{id}', 'CategoryController@edit')->name('edit');
    Route::post('category/update', 'CategoryController@update')->name('update');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('delete');
});



// Route::namespace($namespace)->prefix('admin')->middleware(['web'])->name('admin.')->group(function () {
//     Route::get('settings', 'SettingController@index')->name('setting.index');
//     Route::post('setting/store', 'SettingController@store')->name('setting.store');
//     Route::post('setting/update', 'SettingController@update')->name('setting.update');
// });


// Route::get('admin/category', function () {
//     return " wow your model working";
// });
