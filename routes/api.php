<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login']);
Route::get('/user', [UserController::class, 'index']);//->middleware('auth:sanctum');
