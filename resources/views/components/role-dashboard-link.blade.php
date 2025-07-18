@php
    $route = auth()->user()?->role === 'doctor' ? 'doctor.dashboard' : 'patient.dashboard';
@endphp

<x-responsive-nav-link :href="route($route)" :active="request()->routeIs($route)" wire:navigate>
    {{ $slot ?? __('Dashboard') }}
</x-responsive-nav-link>