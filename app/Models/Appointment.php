<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}
