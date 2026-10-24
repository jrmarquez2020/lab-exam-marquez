<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Student;

Route::post('/tokens/create', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    $user = User::where('email', $credentials['email'])->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        return response()->json([
            'message' => 'Invalid email or password.',
        ], 401);
    }

    $token = $user->createToken('student-manager-api')->plainTextToken;

    return response()->json([
        'token' => $token,
        'token_type' => 'Bearer',
    ]);
});

Route::middleware('auth:sanctum')->get('/students', function () {
    return Student::with('course')->get();
});