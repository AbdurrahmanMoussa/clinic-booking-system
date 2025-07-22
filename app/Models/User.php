<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'specialty',
        'clinic_address',
        'phone_number',
        'date_of_birth',
        'health_card_number',
        'gender'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return strtoupper(substr($this->first_name, 0, 1) . substr($this->last_name, 0, 1));
    }

    public function patientAppointments()
    {
        return $this->hasMany(Appointment::class, "patient_id");
    }
    public function doctorAppointments()
    {
        return $this->hasMany(Appointment::class, "doctor_id");
    }
    public function timeslots()
    {
        return $this->hasMany(Timeslot::class, "doctor_id");
    }
    public function writtenPrescriptions()
    {
        return $this->hasMany(Prescription::class, "doctor_id");
    }
    public function receivedPrescriptions()
    {
        return $this->hasMany(Prescription::class, "patient_id");
    }
}
