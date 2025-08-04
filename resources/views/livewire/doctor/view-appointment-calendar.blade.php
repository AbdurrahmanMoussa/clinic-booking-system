<div>
    <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700 text-sm text-left">
        <thead class="bg-gray-100 dark:bg-zinc-800 text-gray-700 dark:text-gray-200 font-semibold">
            <tr>
                <th class="px-4 py-2">First Name</th>
                <th class="px-4 py-2">Last Name</th>
                <th class="px-4 py-2">Gender</th>
                <th class="px-4 py-2">Appointment Start</th>
                <th class="px-4 py-2">Appointment End</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 dark:divide-zinc-700">
            @foreach ($this->patients as $patient)
                @php $appointment = $patient->patientAppointments->first(); @endphp
                <tr class="hover:bg-gray-50 dark:hover:bg-zinc-700">
                    <td class="px-4 py-2">{{ $patient->first_name }}</td>
                    <td class="px-4 py-2">{{ $patient->last_name }}</td>
                    <td class="px-4 py-2">{{ ucfirst($patient->patientProfile->gender) }}</td>
                    <td class="px-4 py-2">
                        {{ optional($appointment?->timeslot)->start_time }}
                    </td>
                    <td class="px-4 py-2">
                        {{ optional($appointment?->timeslot)->end_time }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
