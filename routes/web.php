<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/blog-posts', function () {
    return view('blog_posts'); // Ensure `blog_posts.blade.php` exists
});

Route::get('/register-user', function () {
    return view('register'); // Ensure `register.blade.php` exists
});

Route::get('/tasks', function () {
    return view('tasks'); // Ensure `tasks.blade.php` exists
});