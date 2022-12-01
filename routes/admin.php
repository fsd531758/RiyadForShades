<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::prefix('dashboard')->group(function () {

//        Route::get('/', function (){
//            return view('admin.auth.login');
//        });

        //admin login
        Route::get('login', 'Auth\AuthController@login')->name('dashboard.login')->middleware('guest:admin');
        Route::post('authenticate', 'Auth\AuthController@authenticate')->name('authenticate');

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('/', 'Auth\AuthController@home')->name('admin.home');
            Route::get('logout', 'Auth\AuthController@logout')->name('admin.logout');


            Route::middleware(['permission:'.permissionName()])->group(function (){
                //role routes
                Route::resource('roles','RoleController');

                //admin users routes
                Route::resource('admin-users','AdminUserController');
                Route::get('my-profile','AdminUserController@profile')->name('admin.profile');
                Route::put('my-profile/{id}/update','AdminUserController@updateProfile')->name('admin.profile.update');

                //master data routes
                Route::resource('master-data','MasterDataController');
            });


        });
    });
});
