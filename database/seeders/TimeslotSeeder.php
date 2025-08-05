<?php

namespace Database\Seeders;

use App\Models\Timeslot;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doctors = User::where('role', 'doctor')->get();
        $startDate = Carbon::today();
        $endDate = Carbon::today()->addWeeks(2);

        foreach ($doctors as $doctor) {
            $date = $startDate->copy();

            while ($date->lte($endDate)) {
                if ($date->isWeekday()) {
                    for ($hour = 9; $hour < 17; $hour++) {
                        Timeslot::create([
                            'doctor_id'  => $doctor->id,
                            'start_time' => $date->copy()->setTime($hour, 0),
                            'end_time'   => $date->copy()->setTime($hour + 1, 0),
                        ]);
                    }
                }

                $date = $date->copy()->addDay();
            }
        }
    }
}
