<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Member\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.member.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('member/list', 'MemberController@index')->name('index');
    Route::get('member/profile', 'MemberController@profile')->name('profile');
});
// Route::namespace($namespace)->name('member.auth.')->middleware(['web'])->group(function () {
//     Route::get('member', 'MemberController@register')->name('register');
//     Route::post('member/register/save', 'MemberController@store')->name('store');
//     Route::get('member/login', 'MemberController@showlogin')->name('showlogin');
//     Route::post('member/login/save', 'MemberController@login')->name('login');
//     Route::get('member/profile', 'MemberController@index')->name('profile');
//     Route::get('member/settings', 'MemberController@settings')->name('settings');
//     Route::post('member/update', 'MemberController@update')->name('update');
//     Route::get('member/library', 'MemberController@library')->name('library');
//     // Route::get('member/plan', 'MemberController@plan')->name('plan');
//     Route::get('member/change/password', 'MemberController@changePassword')->name('change_password');
//     Route::post('member/update/password', 'MemberController@updatePassword')->name('updatePassword');
//     Route::get('member/logout', 'MemberController@logout')->name('logout');
// });


// social login
// Route::group(['middleware' => ['web']], function () {
//     Route::get('login/otp', [Cinebaz\Member\Http\Controllers\OtpLoginController::class, 'Index'])->name('login.otp');
//     Route::get('send/otp/code', [Cinebaz\Member\Http\Controllers\OtpLoginController::class, 'SendOTPCode'])->name('send.otp');
//     Route::get('save/otp/code/{phone}', [Cinebaz\Member\Http\Controllers\OtpLoginController::class, 'SaveOTPCode'])->name('save.otp');


//     Route::get('login/google', [Cinebaz\Member\Http\Controllers\MemberController::class, 'redirectToGoogle'])->name('login.google');
//     Route::get('auth/google/callback', [Cinebaz\Member\Http\Controllers\MemberController::class, 'handleGoogleCallback']);
//     Route::get('login/facebook', [Cinebaz\Member\Http\Controllers\MemberController::class, 'redirectToFacebook'])->name('login.facebook');
//     Route::get('auth/facebook/callback', [Cinebaz\Member\Http\Controllers\MemberController::class, 'handleFacebookCallback']);
// });

