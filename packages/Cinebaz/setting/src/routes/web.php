<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Setting\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->middleware(['web', 'auth:web'])->name('admin.')->group(function () {
    Route::get('settings', 'SettingController@index')->name('setting.index');
    Route::post('setting/store', 'SettingController@store')->name('setting.store');
    Route::post('setting/update', 'SettingController@update')->name('setting.update');
    Route::get('setting/menu', 'SettingController@menu')->name('setting.menu');
});

// Route::get('settings/test', function () {
//     return " wow your model working";
// });
