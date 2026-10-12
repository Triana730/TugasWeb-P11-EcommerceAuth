<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 3 user dengan role berbeda (dipakai di Bagian B). Password semuanya: password
        User::create([
            'name' => 'Admin Toko',
            'email' => 'admin@example.com',
            'password' => 'password',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Editor Toko',
            'email' => 'editor@example.com',
            'password' => 'password',
            'role' => 'editor',
        ]);

        User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => 'password',
            'role' => 'user',
        ]);

        $this->call(ProductSeeder::class);
    }
}