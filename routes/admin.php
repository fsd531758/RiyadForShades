<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::prefix('admin')->group(function () {

        //admin login
        Route::get('login', 'Auth\AuthController@login')->name('dashboard.login')->middleware('guest:admin');
        Route::post('authenticate', 'Auth\AuthController@authenticate')->name('authenticate');

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('/', 'Auth\AuthController@home')->name('admin.home');
            Route::get('logout', 'Auth\AuthController@logout')->name('admin.logout');


            //role routes
            Route::resource('roles', 'RoleController');

            //admin users routes
            Route::resource('admin-users', 'AdminUserController');
            Route::get('my-profile', 'AdminUserController@profile')->name('admin.profile');
            Route::put('my-profile/{id}/update', 'AdminUserController@updateProfile')->name('admin.profile.update');

            //projects routes
//            Route::resource('projects', 'ProjectController');

            //slider routes
            Route::resource('sliders', 'SliderController');

            //category routes
            Route::resource('categories', 'CategoryController');

            //product routes
            Route::resource('products', 'ProductController');

            //product routes
            Route::resource('services', 'ServiceController');

            //teams routes
            Route::resource('teams', 'TeamController');

            //testimonials routes
            Route::resource('testimonials', 'TestimonialController');

            //partners routes
            Route::resource('partners', 'PartnerController');

            //portfolios routes
            Route::resource('portfolios', 'PortfolioController');

            //blog routes
            Route::resource('blog', 'BlogController');

            //FAQ routes
            Route::resource('faqs', 'FaqController');

            //pages routes
            Route::resource('pages', 'PageController');

            //setting routes
            Route::resource('settings', 'SettingController');


        });
    });
});
