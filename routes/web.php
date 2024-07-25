<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController; 
use Illuminate\Support\Facades\Route; //dependency added for line 9 controller

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>['auth']],function(){
    Route::resource('posts',PostController::class);
    Route::resource('photos',PhotoController::class);
    Route::get('/home', [PostController::class, 'index'])->name('home')->middleware('auth');
});

Auth::routes();

