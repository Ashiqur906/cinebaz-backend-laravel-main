<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Admin\Http\Controllers';
Route::namespace($namespace)->prefix('admin')->name('admin.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('profile', 'AdminController@index')->name('index');
    Route::get('profile/edit', 'AdminController@edit')->name('edit');
    Route::post('update', 'AdminController@update')->name('update');

    Route::get('list', 'AdminController@list')->name('register');
    Route::get('trash/list', 'AdminController@trash')->name('trash');
    Route::get('edit', 'AdminController@admin_edit')->name('profile.edit');
    Route::get('trash/destroy/{id}', 'AdminController@trash_destroy')->name('trash_delete');
    Route::get('trash/restore/{id}', 'AdminController@trash_restore')->name('trash_restore');
    
    Route::get('add', 'AdminController@create')->name('add');
    Route::post('store', 'AdminController@store')->name('store');
    Route::get('view/{id}', 'AdminController@view')->name('view');
    Route::get('destroy/{id}', 'AdminController@destroy')->name('delete');
    Route::get('add', 'AdminController@create')->name('add');
});
