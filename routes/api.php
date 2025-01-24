<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

// Route to create a new blog post

Route::post('/posts', [PostController::class, 'store']);

// Route to list all blog posts

Route::get('/posts', [PostController::class, 'index']);

// Route to view a single blog post by ID
Route::get('/posts/{id}', [PostController::class, 'show']);

// Route to register a new user
Route::post('/register', [UserController::class, 'register']);

// Route to create a new task
Route::post('/tasks', [TaskController::class, 'store']);

// Route to update a task's completion status
Route::patch('/tasks/{id}', [TaskController::class, 'update']);

// Route to get all pending tasks
Route::get('/tasks/pending', [TaskController::class, 'pending']);