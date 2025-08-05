<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Doctor\Dashboard as DoctorDashboard;
use App\Livewire\Doctor\ViewAppointmentCalendar;
use App\Livewire\Patient\BookAppointmentCalendar;
use App\Livewire\Patient\Dashboard as PatientDashboard;
use App\Livewire\TimeslotList;

// Role-based redirect after login
Route::get('/dashboard', function () {
    $user = Auth::user();
    return redirect()->route($user->role . '.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Patient routes
Route::middleware(['auth', 'verified', 'role:patient'])->group(function () {
    Route::get('patient/dashboard', PatientDashboard::class)->name('patient.dashboard');
    Route::get('appointments', BookAppointmentCalendar::class)->name('patient.book-appointment-calendar');
    // Route::get('timeslots', TimeslotList::class)->name('patient.timeslot-list');
});

// Doctor routes
Route::middleware(['auth', 'verified', 'role:doctor'])->group(function () {
    Route::get('doctor/dashboard', DoctorDashboard::class)->name('doctor.dashboard');
    Route::get('doctor/appointments', ViewAppointmentCalendar::class)->name('doctor.view-appointment-calendar');
});

// Public route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Static pages
Route::view('/contact', 'contact')->name('contact');

// Volt settings routes
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Auth routes
require __DIR__ . '/auth.php';