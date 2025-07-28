<?php

namespace App\Livewire;

use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\Timeslot;
use Livewire\Component;

class TimeslotList extends Component
{
    public ?int $doctorId = null;
    public ?string $date = null;
    public ?int $selectedTimeslotId = null;

    public function selectTimeslot($id)
    {
        $this->selectedTimeslotId = $id;
    }

    public function getAlreadyBookedProperty()
    {
        return \App\Models\Appointment::where('patient_id', Auth::id())
            ->where('status', 'scheduled')
            ->exists();
    }

    public function bookAppointment()
    {
        $timeslot = Timeslot::findOrFail($this->selectedTimeslotId);

        if ($timeslot->is_booked) {
            $this->addError('timeslot', 'This timeslot is already booked.');
            return;
        }

        $alreadyBooked = Appointment::where('patient_id', Auth::id())
            ->where('status', 'scheduled')
            ->exists();

        if ($alreadyBooked) {
            $this->addError('timeslot', 'You already have a scheduled appointment.');
            return;
        }

        Appointment::create([
            'doctor_id' => $timeslot->doctor_id,
            'patient_id' => Auth::id(),
            'timeslot_id' => $timeslot->id,
            'status' => 'scheduled',
            'notes' => null
        ]);

        $timeslot->update(['is_booked' => true]);

        session()->flash('success', 'Appointment booked successfully.');
        $this->redirect(route('patient.dashboard'));
    }
    public function getCurrentTimeslotsProperty()
    {
        return Timeslot::where('doctor_id', $this->doctorId)
            ->whereDate('start_time', $this->date)
            ->orderBy('start_time')
            ->get();
    }

    public function render()
    {
        $timeslots = Timeslot::where('doctor_id', $this->doctorId)
            ->whereDate('start_time', $this->date)
            ->orderBy('start_time')
            ->get();

        return view('livewire.timeslot-list', compact('timeslots'));
    }
}
