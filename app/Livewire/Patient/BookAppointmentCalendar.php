<?php

namespace App\Livewire\Patient;

use App\Models\Timeslot;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;

class BookAppointmentCalendar extends Component
{
    public $selectedDate = null;
    public $selectedDoctorId = null;
    public $updating = null;

    protected $listeners = ['day-selected' => 'setDate'];

    public function setDate($date)
    {
        $this->selectedDate = $date;
    }

    #[Computed]
    public function availableDates()
    {
        if (!$this->selectedDoctorId) {
            return collect();
        }

        return Timeslot::where('doctor_id', $this->selectedDoctorId)
            ->pluck('start_time')
            ->map(fn($dt) => Carbon::parse($dt)->toDateString())
            ->unique()
            ->values();
    }

    #[Computed]
    public function doctors()
    {
        return User::where('role', 'doctor')->get();
    }

    public function updatedSelectedDoctorId($value)
    {
        $this->selectedDate = null;
    }

    #[Computed]
    public function currentAppointment()
    {
        return Appointment::with(['doctor', 'timeslot'])
            ->where('patient_id', Auth::id())
            ->where('status', 'scheduled')
            ->latest()
            ->first();
    }

    public function startUpdate()
    {
        $this->cancelAppointment();
        $this->updating = true;
    }
    public function cancelAppointment()
    {

        $appointment = Appointment::where('patient_id', Auth::id())->where('status', 'scheduled')->first();

        if ($appointment) {
            $appointment->status = 'cancelled';
            $appointment->save();
        }
    }

    public function render()
    {
        return view('livewire.patient.book-appointment-calendar');
    }
}
