<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('posts', PostController::class)->only(['index', 'store', 'update', 'destroy']);

Route::resource('topics', TopicController::class);

Route::resource('profile', UserController::class)->parameters([
    'profile' => 'user'
]);
