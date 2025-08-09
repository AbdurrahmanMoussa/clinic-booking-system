<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Timeslot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PastAppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = User::where('email', 'patient@test.com')->firstOrFail();

        $doctors = User::where('role', 'doctor')->get();
        $perDoctor = 6;
        foreach ($doctors as $doctor) {
            $existing = Appointment::where('doctor_id', $doctor->id)
                ->where('patient_id', $patient->id)
                ->where('status', 'completed')
                ->count();

            for ($i = $existing; $i < $perDoctor; $i++) {
                $start = Carbon::now()->subDays(($i + 1) * 2)->setTime(10, 0)->seconds(0);
                $end   = (clone $start)->addHour();

                $slot = Timeslot::firstOrCreate(
                    [
                        'doctor_id'  => $doctor->id,
                        'start_time' => $start,
                        'end_time'   => $end,
                    ],
                    []
                );

                Appointment::firstOrCreate(
                    [
                        'doctor_id'   => $doctor->id,
                        'patient_id'  => $patient->id,
                        'timeslot_id' => $slot->id,
                    ],
                    ['status' => 'completed']
                );
            }
        }
    }
}
