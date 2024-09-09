<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Public route for fetching posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

// Optional: Keep or remove depending on your needs
// Auth::routes();
