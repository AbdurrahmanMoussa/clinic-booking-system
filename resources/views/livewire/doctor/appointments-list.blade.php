<div class="max-w-8xl mx-auto p-6">
    <div class="flex items-center justify-between gap-4 mb-6 flex-wrap">
        <h1 class="text-3xl font-bold text-blue-600 dark:text-blue-400">
            All Appointments
        </h1>

        @php $opts = ['all'=>'All','scheduled'=>'Scheduled','completed'=>'Completed','cancelled'=>'Cancelled']; @endphp

        <div class="hidden md:flex items-center gap-2">
            @foreach ($opts as $val => $label)
                <button wire:click="$set('status','{{ $val }}')" @class([
                    'px-3 py-1.5 rounded-full text-sm border transition',
                    'bg-blue-600 text-white border-blue-600' => $status === $val,
                    'bg-transparent text-gray-800 dark:text-gray-200 border-gray-300 dark:border-zinc-700 hover:bg-gray-100 dark:hover:bg-zinc-800' =>
                        $status !== $val,
                ])>
                    {{ $label }}
                </button>
            @endforeach
        </div>

        <div class="w-full md:hidden">
            <label class="sr-only" for="status">Status</label>
            <select id="status" wire:model.live="status"
                class="w-full rounded-lg border border-gray-300 dark:border-zinc-700 bg-white dark:bg-zinc-900 text-sm p-2">
                @foreach ($opts as $val => $label)
                    <option value="{{ $val }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="space-y-4 md:hidden">
        @forelse ($appointments as $appt)
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow border border-gray-100 dark:border-zinc-700 p-4">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <div class="font-semibold">
                            {{ $appt->patient?->first_name }} {{ $appt->patient?->last_name }}
                        </div>
                        <div class="text-blue-700 dark:text-blue-400 text-sm">
                            {{ ucfirst($appt->patient?->patientProfile?->gender ?? '—') }}
                        </div>
                    </div>
                    <span @class([
                        'px-2 py-0.5 rounded-full text-xs font-semibold',
                        'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' =>
                            $appt->status === 'scheduled',
                        'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' =>
                            $appt->status === 'completed',
                        'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' =>
                            $appt->status === 'cancelled',
                    ])>
                        {{ ucfirst($appt->status) }}
                    </span>
                </div>

                <div class="mt-3 text-sm text-gray-700 dark:text-gray-300">
                    <div><span class="font-medium">Date:</span>
                        {{ $appt->timeslot?->start_time?->format('M d, Y') ?? 'N/A' }}</div>
                    <div><span class="font-medium">Time:</span>
                        {{ $appt->timeslot?->start_time?->format('h:i A') ?? 'N/A' }}</div>
                </div>
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-300">No appointments{{ $status !== 'all' ? " for {$status}" : '' }}.
            </p>
        @endforelse
    </div>

    @if ($appointments->count())
        <div
            class="hidden md:block bg-white dark:bg-gray-800 shadow rounded-xl border border-gray-100 dark:border-zinc-700">
            <div class="overflow-x-auto">
                <table class="min-w-[760px] w-full text-sm text-left divide-y divide-gray-200 dark:divide-zinc-700">
                    <thead
                        class="bg-gray-100 dark:bg-zinc-800 text-gray-700 dark:text-gray-200 font-semibold uppercase">
                        <tr>
                            <th class="px-4 py-3">Patient</th>
                            <th class="px-4 py-3">Gender</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Time</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-zinc-700">
                        @foreach ($appointments as $appt)
                            <tr class="hover:bg-gray-50 dark:hover:bg-zinc-900 transition">
                                <td class="px-4 py-3">
                                    {{ $appt->patient?->first_name }} {{ $appt->patient?->last_name }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ ucfirst($appt->patient?->patientProfile?->gender ?? '—') }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $appt->timeslot?->start_time?->format('M d, Y') ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-3">
                                    {{ $appt->timeslot?->start_time?->format('h:i A') ?? 'N/A' }}
                                </td>
                                <td
                                    class="px-4 py-3 {{ strtolower($appt->status) == 'scheduled' ? 'text-green-600' : (strtolower($appt->status) == 'completed' ? 'text-yellow-600' : 'text-red-500') }}">
                                    {{ ucfirst($appt->status) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @elseif (count($appointments) === 0 && !$loop ?? true)
        <p class="hidden md:block text-gray-600 dark:text-gray-300">No
            appointments{{ $status !== 'all' ? " for {$status}" : '' }}.</p>
    @endif
</div>
