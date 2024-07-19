<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/searсh', [PostController::class, 'search'])->name('search');
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
Route::post('/', [PostController::class, 'store'])->name('store');
