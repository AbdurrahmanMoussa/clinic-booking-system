<?php

namespace App\Livewire\Patient;

use App\Models\Timeslot;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;


class BookAppointmentCalendar extends Component
{
    public $selectedDate = null;
    public $selectedDoctorId = null;
    public $pendingAction = null;
    public $pendingAppointmentId = null;
    public $updating = false;

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

    public function confirmAction()
    {
        if ($this->pendingAction == 'update') {
            $this->startUpdate();
        } elseif ($this->pendingAction == 'cancel') {
            $this->cancelAppointment();
        }
    }

    public function cancelAction()
    {
        $this->pendingAction = null;
        $this->pendingAppointmentId = null;
    }

    public function askConfirmation($action)
    {
        $this->pendingAction = $action;
        $this->pendingAppointmentId = $this->currentAppointment?->id;
    }

    public function startUpdate()
    {
        $this->selectedDoctorId = $this->currentAppointment()->doctor_id;
        $this->updating = true;
        $this->cancelAppointment();
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
