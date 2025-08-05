<?php

namespace App\Livewire\Patient;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public function render()
    {
        $userId = Auth::id();

        $upcoming = \App\Models\Appointment::with(['doctor', 'timeslot'])
            ->where('patient_id', $userId)
            ->where('status', 'scheduled')
            ->whereHas('timeslot', function ($query) {
                $query->where('start_time', '>=', now());
            })
            ->get()
            ->sortBy('timeslot.start_time')
            ->first();
    }
}
