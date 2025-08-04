<?php

namespace App\Livewire\Patient;

use App\Models\User;


use Livewire\Component;

class Dashboard extends Component
{

    public function user()
    {
        return User::where('role', 'patient')->get();
    }
    public function render()
    {
        return view('livewire.patient.dashboard');
    }
}
