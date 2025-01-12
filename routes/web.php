<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\authmiddleware;
use App\Http\Controllers\logincontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->group(function () {
    Route::middleware('user')->group(function () {
        Route::prefix('category')->group(function () {
            Route::get('/logout', [logincontroller::class, 'logout'])->name('logout');
            Route::get('/index', [logincontroller::class, 'index'])->name('index');
        });
    });
    Route::middleware('authuser')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::get('/register', [logincontroller::class, 'register'])->name('register');
            Route::post('/registerstore', [logincontroller::class, 'registerstore'])->name('postRegister');
            Route::get('/login', [logincontroller::class, 'login'])->name('login');
            Route::post('/store', [logincontroller::class, 'loginstore'])->name('postLogin');
        });
    });
});
