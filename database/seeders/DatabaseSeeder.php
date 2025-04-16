<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
   

    public function run(): void
    {
        // Seed user biasa
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    
        // Seed admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@tes.com',
            'password' => Hash::make('admin123'), // Jangan lupa hash
            'role' => 'tata_usaha', // Pastikan kolom 'role' ada di tabel users
        ]);
    }
    
}
