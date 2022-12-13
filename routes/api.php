<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'API', 'middleware' => 'APILocalization'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', 'AuthController@register');
        Route::get('user/verify/{verification_code}', 'AuthController@verifyUser')->name('user.verify');
        Route::post('login', 'AuthController@login');
        Route::post('forgot-password', 'AuthController@forgetPassword');
        Route::post('reset-forgot-password', 'AuthController@resetForgottenPassword');
        Route::post('update-token', 'AuthController@updateToken');
    });


// authenticated routes
    Route::group(['middleware' => ['jwt.verify:api', 'IsVerified']], function () {
        Route::group(['namespace' => 'Auth'], function () {
            Route::post('logout', 'AuthController@logout');
            // user routes
            Route::get('profile', 'AuthController@profile')->withoutMiddleware('IsVerified');
//        Route::get('profile', 'AuthController@profile');
            Route::post('update', 'AuthController@update');
            Route::post('change-password', 'AuthController@changePassword');

            // firebase notifications
            Route::post('store-token', 'FirebaseController@storeToken');
            Route::get('get-user-tokens', 'FirebaseController@getUserTokens');
            Route::post('delete-user-tokens', 'FirebaseController@deleteUserTokens');
            Route::post('delete-user-token', 'FirebaseController@deleteUserToken');
        });
    });
});
