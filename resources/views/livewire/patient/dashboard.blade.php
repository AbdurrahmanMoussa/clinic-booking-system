<div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 py-6">


    <x-dashboard-card title="View Appointments" :route="route('patient.book-appointment-calendar')"
        description="Check your upcoming and past appointments.">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M8 7V3m8 4V3M5 11h14M5 19h14M5 15h14M3 3h18v18H3V3z" />
        </svg>
    </x-dashboard-card>

    <x-dashboard-card title="Manage Profile" :route="route('settings.profile')" description="Update your personal information.">

        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M5.121 17.804A6.002 6.002 0 0112 15a6.002 6.002 0 016.879 2.804M15 12a3 3 0 11-6 0 3 3 0 016 0zm6 8a2 2 0 01-2 2H5a2 2 0 01-2-2" />
        </svg>
    </x-dashboard-card>

    <x-dashboard-card title="Medical History" icon='' :route="'#'"
        description="View your past diagnoses and prescription history." />

    <x-dashboard-card title="Notifications" icon='' :route="'#'"
        description="Stay updated with upcoming appointments and alerts." />

    <x-dashboard-card title="Help Center" icon='' :route="'#'"
        description="Need assistance? Access our help and support resources." />




    <div
        class="rounded-2xl border border-blue-600 bg-blue-950 hover:bg-blue-900 hover:shadow-xl hover:scale-[1.01] transition duration-300">
        <x-dashboard-card title="Upcoming Appointment" icon="" :route="route('patient.book-appointment-calendar')" :description="$upcoming
            ? 'Dr. ' .
                $upcoming->doctor->last_name .
                ' on ' .
                \Carbon\Carbon::parse($upcoming->timeslot->start_time)->format('M d, h:i A')
            : 'No upcoming appointments'" />
    </div>





</div>
