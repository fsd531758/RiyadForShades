<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\OrderController;

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    //    Auth::routes();

    // Route::get('/', function () {
    //     return view('welcome');
    // })->name('home');

    // Route::get('/cart', function () {
    //     return view('frontend.cart');
    // })->name('cart');

    // Route::get('login', 'Auth\AuthController@login')->name('front.login');

});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries');
Route::get('/services/{id}', [ServicesController::class, 'show'])->name('service');
// Route::get('/products', [ProductController::class , 'index'])->name('products');
// Route::get('/products/{id}', [ProductController::class , 'show'])->name('product');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-save', [ContactController::class, 'store'])->name('contact.save');
// Route::post('/order', [OrderController::class , 'order_post'])->name('order.submit');
