<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});