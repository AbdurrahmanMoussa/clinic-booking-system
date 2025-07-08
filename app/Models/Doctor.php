<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    function patients()
    {
        return $this->hasMany(Patient::class);
    }
    function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
