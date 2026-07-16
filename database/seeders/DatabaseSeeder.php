<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun admin Diskominsa
        User::create([
            'name' => 'Admin Diskominsa',
            'email' => 'admindiskominsa@portal.com', // Email baru kamu
            'password' => Hash::make('admindiskominsa123'), // Password baru kamu
            'role' => 'admin',
        ]);
    }
}