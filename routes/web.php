<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\ContactController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//Route::group(['prefix' => LaravelLocalization::setLocale(),
//    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () { //...
//        Route::get('/', 'HomeController@index')->name('home');
//        Route::get('/track', 'HomeController@track')->name('order.track');
//        Route::get('/news', 'NewsController@index')->name('news');
//        Route::get('/news/{id}', 'NewsController@news')->name('single-news');
//
//        Route::get('/categories', 'ProductController@index')->name('products');
//        Route::get('/category/{id}/products', 'ProductController@category')->name('single-category');
//        Route::get('/product/{id}', 'ProductController@product')->name('single-product');
//
//
//        Route::get('/about', 'AboutController@index')->name('about');
//
//// Route::get('/policy','PolicyController@index')->name('policy');
//        Route::get('/contact', 'ContactController@index')->name('contact');
//        Route::post('/contact', 'ContactController@contact')->name('contact.post');
//
//        Route::get('/contact/{id}', [ContactController::class, 'show'])->name("show.contact");
//        Route::get('/contact/show-reply/{id}', [ContactController::class, 'show_reply'])->name('contact.show-reply');
//        Route::post('/contact/contact-reply', [ContactController::class, 'contact_reply'])->name('contact.contact-reply');
//        Route::post('/contact', 'ContactController@contact_post')->name('direct_contact_post');
//
//        Auth::routes();
//
//    }
//);
Route::get('/',function (){
    return view('welcome');
});
