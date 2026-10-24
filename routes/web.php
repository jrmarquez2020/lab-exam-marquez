<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});