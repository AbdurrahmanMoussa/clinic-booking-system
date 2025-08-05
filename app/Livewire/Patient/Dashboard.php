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

        $upcoming = \App\Models\Appointment::where('patient_id', $userId)
            ->whereHas('timeslot', function ($query) {
                $query->where('start_time', '>=', now());
            })
            ->with(['doctor', 'timeslot'])
            ->get()
            ->sortBy('timeslot.start_time')
            ->first();

        return view('livewire.patient.dashboard', [
            'upcoming' => $upcoming
        ]);
    }
}
