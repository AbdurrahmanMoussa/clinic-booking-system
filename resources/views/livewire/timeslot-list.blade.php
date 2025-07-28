<div>
    @if ($timeslots->isEmpty())
        <p>No available timeslots for {{ $date }}.</p>
    @else
        <ul class="space-y-2">
            @if ($this->alreadyBooked)
                <div class="text-red-600 font-semibold mb-4">
                    You already have an appointment scheduled.
                </div>
            @else
                @foreach ($this->currentTimeslots as $slot)
                    @if (!$slot->is_booked)
                        <button wire:click="selectTimeslot({{ $slot->id }})"
                            class="px-4 py-2 rounded border
                {{ $selectedTimeslotId === $slot->id ? 'bg-blue-600 text-white' : 'bg-white text-black hover:bg-blue-100' }}">
                            {{ \Carbon\Carbon::parse($slot->start_time)->format('g:i A') }}
                        </button>
                    @endif
                @endforeach

                @if ($selectedTimeslotId)
                    <button wire:click="bookAppointment"
                        class="mt-4 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                        Confirm Booking
                    </button>
                @endif
            @endif

        </ul>
    @endif
</div>
