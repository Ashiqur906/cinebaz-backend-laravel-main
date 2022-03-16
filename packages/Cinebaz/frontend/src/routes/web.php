<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$namespace = 'Cinebaz\Frontend\Http\Controllers';


// Route::namespace($namespace)->middleware(['web'])->name('frontend.')->group(function () {
//     Route::get('/', 'FrontendController@index')->name('index');
//     Route::get('/home', 'FrontendController@index')->name('home');
//     Route::get('/movie', 'FrontendController@category')->name('movie');
//     Route::get('/Tv-show', 'FrontendController@TVShow')->name('tv_show');
//     Route::get('/season', 'FrontendController@season')->name('season');
//     Route::get('/series', 'FrontendController@series')->name('series');
//     Route::get('/details/{slug}', 'FrontendController@details')->name('details');

//     Route::get('/show/{slug}', 'FrontendController@start')->name('show');
//     Route::get('/movie/lists/{id}', 'FrontendController@mediaList')->name('media_list');
//     Route::get('/gener/movie/lists/{id}', 'FrontendController@generMediaList')->name('gener.media_list');
//     Route::get('/plan', 'FrontendController@plan')->name('plan');
    
// });
// Route::namespace($namespace)->middleware(['web', 'member'])->name('frontend.')->group(function () {
//     Route::get('/show/{slug}', 'FrontendController@start')->name('show');
// });

// Route::namespace($namespace)->name('member.auth.')->middleware(['web'])->group(function () {
//     Route::get('member/subscription/plan/purchase/{id}', 'PurchaseController@Index')->name('purchase');
// });

// // Ajax data route
// Route::namespace($namespace)->middleware(['web'])->name('frontend.ajax.')->group(function () {
//     // Route::get('frontend/ajax/favorite', 'FrontendController@ajax_favorite')->name('favorite');
//     Route::get('frontend/ajax/favorite/{id}', 'FrontendController@ajax_favorite')->name('favorite');


//     Route::get('frontend/ajax/listing/{id}', 'FrontendController@ajax_listing')->name('listing');
//     Route::get('search', 'FrontendController@ajax_search')->name('search');
// });
