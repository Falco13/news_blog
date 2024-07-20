<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/searсh', [PostController::class, 'search'])->name('search');
Route::get('/create', [PostController::class, 'create'])->name('create');
Route::post('/', [PostController::class, 'store'])->name('store');
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::patch('/update/{id}', [PostController::class, 'update'])->name('update');
Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy');

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
