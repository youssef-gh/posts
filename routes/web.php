<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/Login', [LoginController::class, 'index'])->name('login');
Route::post('/Login', [LoginController::class, 'store']);

Route::post('/Logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.unlikes');





