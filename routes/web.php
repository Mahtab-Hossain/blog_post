<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

// Public routes
Route::get('/register-user', function () {
    return view('register');
})->name('register');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/blog-posts', function () {
        return view('blog_posts');
    });
    Route::get('/tasks', function () {
        return view('tasks');
    });
});