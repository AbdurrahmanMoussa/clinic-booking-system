<div class="space-y-4">
    @if ($this->alreadyBooked)
        <p class="text-sm font-medium text-red-600 dark:text-red-400">
            You already have an appointment scheduled.
        </p>
    @elseif ($this->currentTimeslots->isEmpty())
        <p class="text-sm text-zinc-600 dark:text-zinc-300">
            No available timeslots for {{ $date }}.
        </p>
    @else
        <ul class="space-y-2">
            @foreach ($this->currentTimeslots as $timeslot)
                <li>
                    <button wire:click="selectTimeslot({{ $timeslot->id }})"
                        class="w-full text-left px-4 py-2 rounded border transition
                               border-zinc-300 dark:border-zinc-700
                               hover:bg-blue-50 dark:hover:bg-zinc-700
                               {{ $selectedTimeslotId === $timeslot->id ? 'bg-blue-100 dark:bg-blue-700 text-zinc-900 dark:text-white' : 'bg-white dark:bg-zinc-800 text-zinc-800 dark:text-zinc-100' }}">
                        {{ \Carbon\Carbon::parse($timeslot->start_time)->format('g:i A') }}
                    </button>
                </li>
            @endforeach
        </ul>

        @if ($selectedTimeslotId)
            <button wire:click="bookAppointment"
                class="mt-4 px-4 py-2 rounded text-sm font-semibold
                       bg-green-600 text-white hover:bg-green-700 transition">
                Confirm Booking
            </button>
        @endif
    @endif
</div>
