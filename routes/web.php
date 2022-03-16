<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [\App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');

//Auth
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', 'UserController@register')->name('register.create');
    Route::post('/register', 'UserController@store')->name('register.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');
});
Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');
