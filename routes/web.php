<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Admin Routes with AdminMiddleware
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard'); // Example admin dashboard view
    })->name('admin.dashboard');

    // Routes for managing users
    Route::resource('users', AdminUserController::class);

    // Routes for managing blog posts (Admin)
    Route::resource('posts', AdminPostController::class);
});

// Routes for authenticated users (Standard User)
Route::group(['middleware' => ['auth']], function () {
    Route::resource('posts', PostController::class); // This allows standard users to manage their posts.
    Route::resource('photos', PhotoController::class);

    // Home route
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
