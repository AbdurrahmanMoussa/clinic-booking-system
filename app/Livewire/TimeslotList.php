<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Timeslot;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Computed;

class TimeslotList extends Component
{
    public ?int $doctorId = null;
    public ?string $date = null;
    public ?int $selectedTimeslotId = null;

    public function selectTimeslot($id): void
    {
        $this->selectedTimeslotId = $id;
    }

    #[Computed]
    public function alreadyBooked(): bool
    {
        return Appointment::where('patient_id', Auth::id())
            ->where('status', 'scheduled')
            ->exists();
    }

    #[Computed]
    public function currentTimeslots()
    {
        if (!$this->doctorId || !$this->date) {
            return collect();
        }

        return Timeslot::where('doctor_id', $this->doctorId)
            ->whereDate('start_time', $this->date)
            ->orderBy('start_time')
            ->get();
    }

    public function bookAppointment(): void
    {
        $timeslot = Timeslot::findOrFail($this->selectedTimeslotId);

        if ($timeslot->is_booked) {
            $this->addError('timeslot', 'This timeslot is already booked.');
            return;
        }

        if ($this->alreadyBooked) {
            $this->addError('timeslot', 'You already have a scheduled appointment.');
            return;
        }

        Appointment::create([
            'doctor_id' => $timeslot->doctor_id,
            'patient_id' => Auth::id(),
            'timeslot_id' => $timeslot->id,
            'status' => 'scheduled',
            'notes' => null,
        ]);

        $timeslot->update(['is_booked' => true]);

        session()->flash('success', 'Appointment booked successfully.');
        $this->redirect(route('patient.dashboard'));
    }

    public function render()
    {
        return view('livewire.timeslot-list');
    }
}
