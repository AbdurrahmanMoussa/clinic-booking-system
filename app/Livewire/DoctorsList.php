<?php

namespace App\Livewire;

use App\Models\DoctorProfile;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.public')]
class DoctorsList extends Component
{
    public $doctors;

    public function mount()
    {
        $this->doctors = User::query()
            ->where('role', 'doctor')
            ->whereHas('doctorProfile')
            ->with(['doctorProfile'])
            ->orderBy('last_name')
            ->get();
    }

    public function render()
    {
        return view('livewire.doctors-list');
    }
}
