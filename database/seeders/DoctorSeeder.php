<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = [
            [
                'first_name' => 'Maya',
                'last_name' => 'Patel',
                'email' => 'maya.patel@example.com',
                'specialty' => 'Cardiology',
                'clinic_address' => '123 Heartbeat Ave, Ottawa',
                'bio' => 'Specialist in heart health with 10+ years of experience.'
            ],
            [
                'first_name' => 'Lucas',
                'last_name' => 'Chen',
                'email' => 'lucas.chen@example.com',
                'specialty' => 'Dermatology',
                'clinic_address' => '456 SkinCare Blvd, Toronto',
                'bio' => 'Passionate about treating chronic skin conditions and improving patient confidence.'
            ],
            [
                'first_name' => 'Amina',
                'last_name' => 'Yusuf',
                'email' => 'amina.yusuf@example.com',
                'specialty' => 'Pediatrics',
                'clinic_address' => '789 Kids First Rd, Mississauga',
                'bio' => 'Dedicated to child wellness and preventive care.'
            ],
            [
                'first_name' => 'Ethan',
                'last_name' => 'Roy',
                'email' => 'ethan.roy@example.com',
                'specialty' => 'Neurology',
                'clinic_address' => '321 Brainwave Dr, Vancouver',
                'bio' => 'Focused on neurological disorders and long-term treatment plans.'
            ],
            [
                'first_name' => 'Sofia',
                'last_name' => 'Martinez',
                'email' => 'sofia.martinez@example.com',
                'specialty' => 'Orthopedics',
                'clinic_address' => '654 BoneCare Ln, Montreal',
                'bio' => 'Helps patients recover from injuries and regain mobility.'
            ],
        ];

        foreach ($doctors as $doc) {
            $user = User::create([
                'first_name' => $doc['first_name'],
                'last_name' => $doc['last_name'],
                'email' => $doc['email'],
                'password' => Hash::make('password'),
                'role' => 'doctor',
            ]);

            DoctorProfile::create([
                'user_id' => $user->id,
                'specialty' => $doc['specialty'],
                'clinic_address' => $doc['clinic_address'],
                'bio' => $doc['bio'],
            ]);
        }
    }
}
