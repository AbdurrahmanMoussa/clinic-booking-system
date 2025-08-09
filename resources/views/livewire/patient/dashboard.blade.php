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

    <x-dashboard-card title="Help Center" :route="route('contact')"
        description="Need assistance? Access our help and support resources.">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M8 10h.01M12 14h.01M16 10h.01M21 16.5a2.5 2.5 0 01-5 0V16H8v.5a2.5 2.5 0 01-5 0V8a2 2 0 012-2h14a2 2 0 012 2v8.5z" />
        </svg>
    </x-dashboard-card>

    <div
        class="rounded-2xl border border-blue-600 bg-blue-950 hover:bg-blue-900 hover:shadow-xl hover:scale-[1.01] transition duration-300">
        <x-dashboard-card title="Upcoming Appointment" :description="$upcoming
            ? 'Dr. ' .
                $upcoming->doctor->last_name .
                ' on ' .
                \Carbon\Carbon::parse($upcoming->timeslot->start_time)->format('M d, h:i A')
            : 'No upcoming appointments'">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2v-7H3v7a2 2 0 002 2z" />
            </svg>
        </x-dashboard-card>
    </div>

    @if (count($recentPast))
        <div class="mt-6 rounded-2xl border border-zinc-700 bg-zinc-900 p-4">
            <p class="text-sm text-gray-400 mb-2">Recent visits</p>
            <ul class="space-y-1 text-sm text-gray-300">
                @foreach ($recentPast as $a)
                    <li>
                        Dr. {{ $a->doctor->last_name }}
                        at {{ \Carbon\Carbon::parse($a->timeslot->start_time)->format('M d, h:i A') }}
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('patient.appointment-list') }}" class="inline-block mt-2 text-blue-400 hover:underline">
                View all appointments
            </a>
        </div>
    @endif

</div>
