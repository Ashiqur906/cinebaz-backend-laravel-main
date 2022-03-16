<?php

use Illuminate\Support\Facades\Route;

$namespace = 'Cinebaz\Permissions\Http\Controllers';

Route::namespace($namespace)->prefix('admin')->name('admin.permission.')->middleware(['web', 'auth:web'])->group(function () {
    Route::get('roles', 'PermissionsController@role')->name('roles');
    Route::post('role/save', 'PermissionsController@SaveRole')->name('role.save');

    Route::get('permissions', 'PermissionsController@permission')->name('permissions');
    Route::post('permission/save', 'PermissionsController@SavePermission')->name('save');

    Route::get('assign', 'PermissionsController@assign')->name('assign');
    Route::post('role/assign', 'PermissionsController@SaveAssignRole')->name('saveAssignRole');
    Route::post('permission/assign', 'PermissionsController@SaveAssignPermission')->name('saveAssignPermission');
    Route::get('assigned/role/delete', 'PermissionsController@AssignRoleDelete')->name('assignRoleDelete');
    Route::get('assigned/permission/delete', 'PermissionsController@AssignPermissionDelete')->name('assignPermissionDelete');
});
