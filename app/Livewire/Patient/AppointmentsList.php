<?php

namespace App\Livewire\Patient;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AppointmentsList extends Component
{
    public function render()
    {
        $user = Auth::user();
        $appointments = $user
            ->patientAppointments()
            ->with(['doctor.doctorProfile', 'timeslot'])
            ->orderByDesc('id')
            ->get();
        return view('livewire.patient.appointments-list', [
            'appointments' => $appointments
        ]);
    }
}
