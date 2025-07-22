<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlobController;

Route::get('/', [PageController::class, 'home'])->name('/')->middleware('auth');

// Auth views
Route::get('register', [PageController::class, 'register'])->name('register');
Route::get('login', [PageController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// Auth posts
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::resource('blob', BlobController::class);