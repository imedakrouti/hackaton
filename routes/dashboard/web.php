<?php

use App\Http\Controllers\Dashboard\ProfileController;

Route::group(['as'=>'dashboard.','namespace'=>'Dashboard','middleware'=>['auth']], function (){

    Route::get('dashboard','DashboardController@index')->name('welcome');
    Route::get('profile','ProfileController@index')->name('profile');
    Route::post('profile/{user}','ProfileController@update')->name('profile.update');
    Route::post('change-password','ProfileController@changePassword')->name('changePassword');
    Route::resource('client', ClientController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', permissionController::class);//permission.index permission.create //permission.edit //permission.destroy

  });




