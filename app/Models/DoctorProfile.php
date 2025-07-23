<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    protected $fillable = [
        'specialty',
        'clinic_address',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
