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
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::factory()->create([
        //     'first_name' => 'Test',
        //     'last_name' => 'User',
        //     'email' => 'patient@test.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'patient'
        // ]);
        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'Doctor',
            'email' => 'doctor@test.com',
            'password' => Hash::make('password'),
            'role' => 'doctor'
        ]);
    }
}
