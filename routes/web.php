<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Public route for fetching posts
Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);

// Ensure no middleware like ->middleware('cors') is applied to any routes.
Route::get('/test', function () {
    return response()->json(['message' => 'Test route working']);
});