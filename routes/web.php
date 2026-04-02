<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);
Route::get('posts/{id}/restore', [PostController::class, 'restore'])
    ->name('posts.restore');
    

Route::post('/comments', [CommentController::class, 'store'])
    ->name('comments.store');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy');