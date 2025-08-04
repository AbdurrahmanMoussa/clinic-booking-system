<?php

namespace App\Livewire\Doctor;

use Livewire\Attributes\Computed;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class ViewAppointmentCalendar extends Component
{
    #[Computed]
    public function patients()
    {
        $doctorId = Auth::id();

        return User::whereHas('patientProfile')
            ->whereHas('patientAppointments', function ($query) use ($doctorId) {
                $query->where('doctor_id', $doctorId)->where('status', 'scheduled');
            })
            ->with([
                'patientProfile',
                'patientAppointments' => function ($query) use ($doctorId) {
                    $query->where('doctor_id', $doctorId)->where('status', 'scheduled');
                }
            ])
            ->get();
    }

    public function render()
    {
        return view('livewire.doctor.view-appointment-calendar');
    }
}
