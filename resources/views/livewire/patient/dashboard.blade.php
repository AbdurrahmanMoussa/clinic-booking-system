<div>
    {{-- <x-dashboard-card title="Your Appointment" icon="clock">
        @if ($this->user->patientAppointments->where('status', 'scheduled')->isNotEmpty())
            @php $appt = $this->user->patientAppointments->where('status', 'scheduled')->sortBy('timeslot.start_time')->first(); @endphp
            <p class="text-sm">
                <span class="font-semibold">Doctor:</span> {{ $appt->doctor->first_name }}
                {{ $appt->doctor->last_name }}<br>
                <span class="font-semibold">Time:</span>
                {{ \Carbon\Carbon::parse($appt->timeslot->start_time)->toDayDateTimeString() }}
            </p>
        @else
            <p class="text-sm text-gray-500">No upcoming appointments.</p>
        @endif
    </x-dashboard-card> --}}

    <x-dashboard-card title="View Appointments" icon="fas fa-calendar" :route="route('patient.book-appointment-calendar')"
        description="Check your upcoming and past appointments." />

    <x-dashboard-card title="Manage Profile" icon="fas fa-user-cog" :route="route('patient.dashboard')"
        description="Update your personal information." />

</div>
