<?php

namespace App\Livewire\Patient;

use App\Models\Timeslot;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Carbon;

class BookAppointmentCalendar extends Component
{
    public $selectedDate = null;
    public $selectedDoctorId = null;

    protected $listeners = ['day-selected' => 'setDate'];

    public function setDate($date)
    {
        $this->selectedDate = $date;
    }

    public function getAvailableDatesProperty()
    {
        if (!$this->selectedDoctorId) {
            return collect();
        }

        return Timeslot::where('doctor_id', $this->selectedDoctorId)
            ->pluck('start_time')
            ->map(fn($dt) => \Carbon\Carbon::parse($dt)->toDateString())
            ->unique()
            ->values();
    }

    public function getDoctorsProperty()
    {
        return User::where('role', 'doctor')->get();
    }

    public function updatedSelectedDoctorId($value)
    {
        $this->selectedDate = null;
    }
    public function render()
    {
        return view('livewire.patient.book-appointment-calendar');
    }
}
