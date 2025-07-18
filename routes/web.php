<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Patient\Dashboard as PatientDashboard;
use App\Livewire\Doctor\Dashboard as DoctorDashboard;

Route::view('/', 'welcome');

Route::middleware(['auth', 'verified', 'role:patient'])->group(function () {
    Route::get('patient/dashboard', PatientDashboard::class)->name('patient.dashboard');
});

Route::middleware(['auth', 'verified', 'role:doctor'])->group(function () {
    Route::get('doctor/dashboard', DoctorDashboard::class)->name('doctor.dashboard');
});

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/dashboard', function () {
    $user = Auth::user();
    return redirect()->route($user->role . '.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__ . '/auth.php';

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
