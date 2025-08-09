<div>
    <div class="space-y-4 md:hidden">
        @foreach ($appointments as $appt)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-100 dark:border-gray-700 p-4">
                <div class="font-semibold">
                    {{ $appt->doctor?->first_name }} {{ $appt->doctor?->last_name }}
                </div>
                <div class="text-blue-700 dark:text-blue-400 text-sm">
                    {{ $appt->doctor?->doctorProfile?->specialty ?? 'General' }}
                </div>
                <div class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                    <div><span class="font-medium">Date:</span>
                        {{ $appt->timeslot?->start_time?->format('M d, Y') ?? 'N/A' }}</div>
                    <div><span class="font-medium">Time:</span>
                        {{ $appt->timeslot?->start_time?->format('h:i A') ?? 'N/A' }}
                    </div>
                    <div class="mt-1">
                        <span class="font-medium">Status:</span>
                        <span @class([
                            'px-2 py-0.5 rounded-full text-xs font-semibold',
                            'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' =>
                                $appt->status === 'scheduled',
                            'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' =>
                                $appt->status !== 'scheduled',
                        ])>
                            {{ ucfirst($appt->status) }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="hidden md:block">
        <div
            class="bg-white dark:bg-gray-800 shadow rounded-xl overflow-x-auto border border-gray-100 dark:border-gray-700">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase">
                    <tr>
                        <th class="px-6 py-3">Doctor</th>
                        <th class="px-6 py-3">Specialty</th>
                        <th class="px-6 py-3">Date</th>
                        <th class="px-6 py-3">Time</th>
                        <th class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appt)
                        {{-- {{ dd($appt->timeslot->start_time) }} --}}
                        <tr
                            class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                            <td class="px-6 py-4">
                                {{ $appt->doctor?->first_name }} {{ $appt->doctor?->last_name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $appt->doctor?->doctorProfile?->specialty ?? 'General' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ optional($appt->timeslot->start_time)->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ optional($appt->timeslot->start_time)->format('h:i A') }}
                            </td>
                            <td
                                class="px-6 py-4 {{ strtolower($appt->status) == 'scheduled' ? 'text-green-600' : 'text-red-600' }}">
                                {{ ucfirst($appt->status) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
