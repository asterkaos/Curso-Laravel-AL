<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::get('post/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('category/{category}', [PostController::class, 'category'])->name('post.category');

Route::get('tag/{tag}', [PostController::class, 'tag'])->name('post.tag');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
