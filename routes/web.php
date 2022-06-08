<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


require __DIR__ . '/auth.php';

Route::get('/', function () {
   return 'add something here muhfuckaaa';
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/post/{post}/add-comment', [PostController::class, 'comment'])
    ->name('addComment');

Route::resource('posts', PostController::class)
    ->except('create', 'edit');

Route::any('/topics/{topic}/join-topic', [TopicController::class, 'joinTopic'])
    ->name('joinTopic');

Route::resource('topics', TopicController::class);

Route::get('/my-profile', [UserController::class, 'myProfile'])
->name('myProfile');

Route::resource('profile', UserController::class)
    ->parameters([
        'profile' => 'user'
    ]);

Route::resource('categories', CategoryController::class)
    ->except('create', 'show', 'edit');

Route::get('/send-friend-request/{user}', [FriendsController::class, 'processFriendRequest'])
->name('sendFriendRequest');

Route::get('/accept-friend-request/{user}', [FriendsController::class, 'acceptFriendRequest'])
->name('acceptFriendRequest');

Route::get('/deny-friend-request/{user}', [FriendsController::class, 'denyFriendRequest'])
->name('denyFriendRequest');

Route::get('/test', function () {
//    dd(auth()->user()->getAllFriendships());
    dd(auth()->user()->getFriends());
});


Route::view('/friends', 'frontend.friends.index');
