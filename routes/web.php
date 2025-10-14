<?php

use App\Http\Controllers\Auth\LoginPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginPageController::class, 'show'])->name('login');
Route::post('/login', [LoginPageController::class, 'login'])->name('login.post');
