<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
// use App\Product;

Route::get('/', function () {
    return view('app');
})->name('home');

Route::get('/profile', function () {
    return view('users.profile');
})->name('profile');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');



Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
