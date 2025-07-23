<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    protected $fillable = ['date_of_birth', 'health_card_number', 'gender'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
