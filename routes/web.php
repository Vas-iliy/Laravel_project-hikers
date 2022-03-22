<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [\App\Http\Controllers\PageController::class, 'contact'])->name('contact');
Route::get('/about', [\App\Http\Controllers\PageController::class, 'about'])->name('about');
Route::get('/category/{slug}', [\App\Http\Controllers\CategoryController::class, 'category'])->name('category');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'verified'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');
    Route::resource('/categories', CategoryController::class)->middleware('admin');
    Route::post('/categories/activate/{category}', [CategoryController::class, 'activate'])->name('categories.activate')->middleware('admin');
    Route::post('/categories/draft/{category}', [CategoryController::class, 'draft'])->name('categories.draft')->middleware('admin');
    Route::resource('/tags', TagController::class)->middleware('admin');
    Route::post('/tags/activate/{tag}', [TagController::class, 'activate'])->name('tags.activate')->middleware('admin');
    Route::post('/tags/draft/{tag}', [TagController::class, 'draft'])->name('tags.draft')->middleware('admin');
    Route::resource('/posts', PostController::class);
    Route::post('/posts/activate/{post}', [PostController::class, 'activate'])->name('posts.activate')->middleware('admin');
    Route::post('/posts/draft/{post}', [PostController::class, 'draft'])->name('posts.draft')->middleware('admin');
});

//Auth
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'register'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});
Route::get('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/user', [UserController::class, 'show'])->name('user.show')->middleware(['auth', 'verified']);

Route::get('/email/verify', function () {
    return view('user.verify-email');
})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
