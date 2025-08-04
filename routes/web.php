<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Doctor\Dashboard as DoctorDashboard;
use App\Livewire\Doctor\ViewAppointmentCalendar;
use App\Livewire\Patient\BookAppointmentCalendar;
use App\Livewire\Patient\Dashboard as PatientDashboard;
use App\Livewire\TimeslotList;

Route::get('/dashboard', function () {
    $user = Auth::user();
    return redirect()->route($user->role . '.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified', 'role:patient'])->group(function () {
    Route::get('patient/dashboard', PatientDashboard::class)->name('patient.dashboard');
    Route::get('/appointments', BookAppointmentCalendar::class)->name('patient.book-appointment-calendar');
});

Route::middleware(['auth', 'verified', 'role:doctor'])->group(function () {
    Route::get('doctor/dashboard', DoctorDashboard::class)->name('doctor.dashboard');
    Route::get('doctor/appointments', ViewAppointmentCalendar::class)->name('doctor.view-appointment-calendar');
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});


Route::view('/contact', 'contact')->name('contact');

require __DIR__ . '/auth.php';
