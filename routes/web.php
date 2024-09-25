<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index')->middleware('auth');    

Route::get('/dashboard', function () {
    return view('layouts/app');
})->name('dashboard')->middleware('auth');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::POST('/action-login', [AuthController::class, 'authenticate'])->name('action-login');
Route::POST('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('/users', [UserController::class, 'index']);
Route::resource('/users', UsersController::class);
Route::resource('/kategori', KategoriController::class);
