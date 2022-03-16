<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Order\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.order.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('order/list', 'OrderController@index')->name('index');
    Route::get('order/{id}/details', 'OrderController@details')->name('details');
    Route::get('order/{id}/report', 'OrderController@report')->name('report');
});
