<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'user1@example.com'],
            [
                'name' => 'Test User One',
                'password' => Hash::make('Password123!'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'user2@example.com'],
            [
                'name' => 'Test User Two',
                'password' => Hash::make('Password123!'),
            ]
        );
    }
}