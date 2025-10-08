<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Auth\LoginPageController::class, 'show'])->name('login');

