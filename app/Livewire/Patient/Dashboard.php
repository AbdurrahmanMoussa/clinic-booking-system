<?php

namespace App\Livewire\Patient;

use Livewire\Component;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class Dashboard extends Component
{
    public $upcoming;

    public $recentPast = [];
    public function mount()
    {
        $this->upcoming = Appointment::where('patient_id', Auth::id())
            ->where('status', 'scheduled')
            ->whereHas(
                'timeslot',
                fn($q) =>
                $q->where('start_time', '>=', now())
                    ->where('is_booked', true)
            )
            ->with(['doctor', 'timeslot'])
            ->orderBy('id', 'desc')
            ->first();

        $this->loadRecentPast();
    }

    public function loadRecentPast(): void
    {
        $this->recentPast = Appointment::where('patient_id', Auth::id())
            ->whereHas('timeslot', fn($q) => $q->where('start_time', '<', now()))
            ->with([
                'doctor:id,last_name',
                'timeslot:id,start_time',
            ])
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();
    }

    public function render()
    {

        return view('livewire.patient.dashboard');
    }
}
