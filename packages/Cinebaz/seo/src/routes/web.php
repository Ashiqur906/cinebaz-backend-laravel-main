<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Seo\Http\Controllers';
Route::namespace($namespace)->prefix('admin')->name('admin.seo.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('seos', 'SeoController@index')->name('all');
    Route::get('seo/add', 'SeoController@add')->name('add');
    Route::get('seo/{id}/edit', 'SeoController@edit')->name('edit');
    Route::post('seo/save', 'SeoController@store')->name('store');
});
