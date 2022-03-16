<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Pricing\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.subscription.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('subscription/head', 'PricingController@SubHead')->name('head');
    Route::get('subscription/head/add', 'PricingController@create')->name('add_sub_head');
    Route::post('subscription/head/save', 'PricingController@SaveSubHead')->name('add_sub_save');
    Route::get('subscription/head/delete/{id}', 'PricingController@DeleteSubHead')->name('dlt_sub_head');

    Route::get('pricing/plan/head', 'PricingController@PlanHead')->name('plan');
    Route::get('pricing/plan/head/add', 'PricingController@PleanCreate')->name('add_plan_head');
    Route::post('pricing/plan/head/save', 'PricingController@SavePlanHead')->name('add_panel_save');
    Route::get('pricing/plan/delete/{id}', 'PricingController@DeletePlanHead')->name('dlt_plan_head');

    Route::get('pricing/plan/assign', 'PricingController@index')->name('assign');
    Route::get('pricing/plan/assign/add', 'PricingController@assign')->name('add_assign');
    Route::post('pricing/plan/assign/save', 'PricingController@SaveAssign')->name('assign_save');
    Route::get('pricing/plan/assign/delete/{id}', 'PricingController@DeleteAssignPlan')->name('dlt_assign');
    // Route::get('pricing/edit/{id}', 'PricingController@Priceedit')->name('edit');
    // Route::post('pricing/update', 'PricingController@update1')->name('update');
    // Route::get('/pricing/delete/{id}', 'PricingController@Pricedestroy')->name('delete');
});

Route::namespace($namespace)->prefix('admin')->name('admin.videoquality.')->middleware(['web'])->group(function () {
    Route::get('videoquality', 'PricingController@videoQuality')->name('videoQuality');
    Route::get('videoquality/add', 'PricingController@videoQualityAdd')->name('add');
    Route::post('videoquality/save', 'PricingController@VideoQualityStore')->name('save');

    Route::get('videoquality/edit/{id}', 'PricingController@edit')->name('edit');
    Route::post('videoquality/update', 'PricingController@update')->name('update');
    Route::get('/videoquality/delete/{id}', 'PricingController@QualityDelete')->name('delete');
});
