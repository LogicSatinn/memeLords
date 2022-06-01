<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('posts', PostController::class)->only(['index', 'store', 'update', 'destroy']);

//Route::view('/topics', 'frontend.topics.index');
//Route::view('/topics/create', 'frontend.topics.create');

Route::resource('topics', TopicController::class);
