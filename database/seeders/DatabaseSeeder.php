<?php

namespace Database\Seeders;

use App\Models\PatientProfile;
use App\Models\User;
use Carbon\Carbon;
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
        //     'last_name' => 'Doctor',
        //     'email' => 'doctor@test.com',
        //     'password' => Hash::make('password'),
        //     'role' => 'doctor'
        // ]);
        $user = User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'patient@test.com',
            'password' => Hash::make('password'),
            'role' => 'patient',
        ]);

        PatientProfile::create([
            'user_id' => $user->id,
            'date_of_birth' => Carbon::parse('2000-01-01'),
            'health_card_number' => 'A1234-567-890',
            'gender' => 'female',
        ]);
        $this->call([TimeslotSeeder::class]);
    }
}
