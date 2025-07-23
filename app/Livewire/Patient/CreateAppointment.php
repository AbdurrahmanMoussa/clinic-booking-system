<?php

namespace App\Livewire\Patient;

use Livewire\Component;

class CreateAppointment extends Component
{
    public $user;
    public function render()
    {
        return view('livewire.patient.create-appointment');
    }
}
