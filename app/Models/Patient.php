<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    function doctors()
    {
        return $this->belongsTo(Doctor::class);
    }
    function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
