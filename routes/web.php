<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Frontend\ContactController;

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
//    Auth::routes();

    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});


Route::get('/', [HomeController::class , 'index'])->name('home');
Route::get('/about', [AboutController::class , 'index'])->name('about');
Route::get('/services', [ServicesController::class , 'index'])->name('services');
Route::get('/contact', [ContactController::class , 'index'])->name('contact');
Route::post('/contact-save', [ContactController::class , 'store'])->name('contact.save');
