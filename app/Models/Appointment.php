<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        "doctor_id",
        "patient_id",
        "timeslot_id",
        "status",
        "notes"
    ];
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, "patient_id");
    }
    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class, 'timeslot_id');
    }
}
