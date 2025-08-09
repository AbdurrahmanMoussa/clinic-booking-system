<?php

use App\Livewire\Doctor\AppointmentsList as DoctorAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Doctor\Dashboard as DoctorDashboard;
use App\Livewire\Doctor\ViewAppointmentCalendar;
use App\Livewire\DoctorsList;
use App\Livewire\Patient\AppointmentsList as PatientAppointment;
use App\Livewire\Patient\BookAppointmentCalendar;
use App\Livewire\Patient\Dashboard as PatientDashboard;

Route::get('/dashboard', function () {
    $user = Auth::user();
    return redirect()->route($user->role . '.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', 'role:patient'])->group(function () {
    Route::get('patient/dashboard', PatientDashboard::class)->name('patient.dashboard');
    Route::get('book-appointment', BookAppointmentCalendar::class)->name('patient.book-appointment-calendar');
    Route::get('appointments', PatientAppointment::class)->name('patient.appointment-list');
});

Route::middleware(['auth', 'verified', 'role:doctor'])->group(function () {
    Route::get('doctor/dashboard', DoctorDashboard::class)->name('doctor.dashboard');
    Route::get('doctor/current-appointments', ViewAppointmentCalendar::class)->name('doctor.view-appointment-calendar');
    Route::get('doctor/appointments/all', DoctorAppointment::class)
        ->name('doctor.appointments-list');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('/contact', 'contact')->name('contact');
Route::get('/doctors', DoctorsList::class)->name('doctors-list');
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
