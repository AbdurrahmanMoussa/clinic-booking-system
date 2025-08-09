<?php

namespace App\Livewire\Doctor;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppointmentsList extends Component
{
    public string $status = 'all';

    public function render()
    {
        $appointments = Auth::user()
            ->doctorAppointments()
            ->with(['patient.patientProfile', 'timeslot'])
            ->when(
                $this->status !== 'all',
                fn($q) =>
                $q->where('status', $this->status)
            )
            ->orderByDesc('id')
            ->get();

        return view('livewire.doctor.appointments-list', compact('appointments'));
    }
}
