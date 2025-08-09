@if ($this->patients->count())
    <div class="bg-white dark:bg-gray-800 shadow rounded-xl border border-gray-100 dark:border-zinc-700">
        <div class="overflow-x-auto">
            <table class="min-w-[720px] w-full text-sm text-left divide-y divide-gray-200 dark:divide-zinc-700">
                <thead class="bg-gray-100 dark:bg-zinc-800 text-gray-700 dark:text-gray-200 font-semibold uppercase">
                    <tr>
                        <th class="px-4 py-3">First Name</th>
                        <th class="px-4 py-3">Last Name</th>
                        <th class="px-4 py-3">Gender</th>
                        <th class="px-4 py-3 hidden sm:table-cell">Appointment Start</th>
                        <th class="px-4 py-3 hidden sm:table-cell">Appointment End</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-zinc-700">

                    @foreach ($this->patients as $patient)
                        @php $appointment = $patient->patientAppointments->first(); @endphp
                        @php
                            $canCancel =
                                $appointment->status === 'scheduled' &&
                                ($appointment->timeslot?->start_time?->isFuture() ?? false);
                        @endphp
                        <tr class="hover:bg-gray-50 dark:hover:bg-zinc-900 transition">
                            <td class="px-4 py-3">{{ $patient->first_name }}</td>
                            <td class="px-4 py-3">{{ $patient->last_name }}</td>
                            <td class="px-4 py-3">{{ ucfirst($patient->patientProfile?->gender ?? '—') }}</td>
                            <td class="px-4 py-3 hidden sm:table-cell">
                                {{ $appointment?->timeslot?->start_time?->format('M d, Y h:i A') ?? 'N/A' }}
                            </td>
                            <td class="px-4 py-3 hidden sm:table-cell">
                                {{ $appointment?->timeslot?->end_time?->format('M d, Y h:i A') ?? 'N/A' }}
                            </td>
                            <td class="px-4 py-3 flex gap-2">
                                <button wire:click="cancel({{ $appointment->id }})" @disabled(!$canCancel)
                                    class="px-3 py-1.5 rounded-lg text-sm
               {{ $canCancel ? 'bg-red-600 text-white hover:bg-red-700' : 'bg-gray-300 dark:bg-zinc-700 text-gray-600 cursor-not-allowed' }}">
                                    Cancel
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <div>
        <p class="text-gray-600 dark:text-gray-300">No upcoming appointments.</p>
    </div>
@endif
