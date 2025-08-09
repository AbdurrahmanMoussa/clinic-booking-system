<?php

namespace App\Livewire\Doctor;

use App\Models\Appointment;
use Livewire\Attributes\Computed;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ViewAppointmentCalendar extends Component
{
    public $patients = [];

    public function mount()
    {
        $this->loadPatients();
    }

    public function loadPatients()
    {
        $doctorId = Auth::id();

        $this->patients = User::whereHas('patientProfile')
            ->whereHas('patientAppointments', function ($q) use ($doctorId) {
                $q->where('doctor_id', $doctorId)
                    ->where('status', 'scheduled')
                    ->whereHas('timeslot', fn($t) => $t->where('start_time', '>', now()));
            })
            ->with([
                'patientProfile',
                'patientAppointments' => function ($q) use ($doctorId) {
                    $q->where('doctor_id', $doctorId)
                        ->where('status', 'scheduled')
                        ->whereHas('timeslot', fn($t) => $t->where('start_time', '>', now()))
                        ->with(['timeslot' => fn($t) => $t->orderBy('start_time', 'asc')]);
                },
            ])
            ->get();
    }

    public function cancel(int $id)
    {
        $appt = Appointment::with('timeslot')
            ->where('id', $id)
            ->where('doctor_id', Auth::id())
            ->firstOrFail();

        if ($appt->status !== 'scheduled') return back();
        if ($appt->timeslot?->start_time?->isPast()) return back();

        $appt->update(['status' => 'cancelled']);

        if ($appt->timeslot && array_key_exists('is_booked', $appt->timeslot->getAttributes())) {
            $appt->timeslot->update(['is_booked' => false]);
        }

        return redirect()->route('doctor.dashboard');
    }

    public function render()
    {
        return view('livewire.doctor.view-appointment-calendar');
    }
}
