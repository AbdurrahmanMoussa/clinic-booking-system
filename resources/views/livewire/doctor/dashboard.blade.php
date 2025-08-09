<div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 py-6">

    <x-dashboard-card title="View Scheduled Patient Information" :route="route('doctor.view-appointment-calendar')"
        description="Check the detailed info about the upcoming patients appointments.">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M8 7V3m8 4V3M5 11h14M5 19h14M5 15h14M3 3h18v18H3V3z" />
        </svg>
    </x-dashboard-card>

    <x-dashboard-card title="View All Previous Appointments" :route="route('doctor.appointments-list')"
        description="Check out all of your appointment history.">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 17v-2h6v2m-3-6h.01M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" />
        </svg>
    </x-dashboard-card>

    <x-dashboard-card title="Manage Your Profile" :route="route('settings.profile')" description="Update your personal information.">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5.121 17.804A6.002 6.002 0 0112 15a6.002 6.002 0 016.879 2.804M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 8a2 2 0 01-2 2H5a2 2 0 01-2-2" />
        </svg>
    </x-dashboard-card>

</div>
