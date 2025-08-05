<div class="space-y-6">
    @if (!$this->currentAppointment)
        <div>
            <label for="doctor" class="block mb-2 text-sm font-medium text-zinc-800 dark:text-zinc-100">Select a
                Doctor:</label>
            <select id="doctor" wire:model.live="selectedDoctorId"
                class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-zinc-100 p-2 transition">
                <option value="">Select a doctor</option>
                @foreach ($this->doctors as $doc)
                    <option value="{{ $doc->id }}">{{ $doc->first_name }} {{ $doc->last_name }}</option>
                @endforeach
            </select>
        </div>
    @endif
    @if ($selectedDoctorId || $updating)
        <livewire:appointment-calendar :doctor-id="$selectedDoctorId" :available-dates="$this->availableDates->toArray()" :selected-date="$selectedDate"
            wire:key="'calendar-'.$selectedDoctorId" />
    @endif

    @if ($selectedDoctorId && $selectedDate)
        <livewire:timeslot-list :doctor-id="$selectedDoctorId" :date="$selectedDate"
            wire:key="'timeslots-'.$selectedDoctorId.'-'.$selectedDate" />
    @endif

    @if ($this->currentAppointment)
        <div
            class="p-4 mb-4 border rounded-lg bg-zinc-100 dark:bg-zinc-800 border-zinc-200 dark:border-zinc-700 shadow-sm">
            <p class="text-lg font-semibold text-zinc-800 dark:text-zinc-100 mb-2">Your Current Appointment:</p>
            <p class="text-zinc-700 dark:text-zinc-300">
                Doctor: {{ $this->currentAppointment->doctor->first_name }}
                {{ $this->currentAppointment->doctor->last_name }}
            </p>
            <p class="text-zinc-700 dark:text-zinc-300">
                Date:
                {{ \Carbon\Carbon::parse($this->currentAppointment->timeslot->start_time)->toFormattedDateString() }}
            </p>
            <p class="text-zinc-700 dark:text-zinc-300">
                Time: {{ \Carbon\Carbon::parse($this->currentAppointment->timeslot->start_time)->format('g:i A') }}
            </p>

            @if ($this->pendingAction)
                <div
                    class="p-4 mb-4 border rounded-lg bg-zinc-100 dark:bg-zinc-800 border-zinc-200 dark:border-zinc-700 shadow-sm">
                    <p class="text-md font-black text-zinc-800 dark:text-zinc-100 mb-2">Are you sure you want to
                        {{ $pendingAction }}? This will cancel your current appointment.</p>
                    <div class="mt-4 flex gap-4">
                        <button wire:click="confirmAction"
                            class="px-4 py-2 bg-green-500 hover:bg-green-600 text-white transition">Confirm</button>
                        <button wire:click="cancelAction"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white transition">Cancel</button>
                    </div>
                </div>
            @else
                <div class="mt-4 flex gap-4">
                    <button wire:click="askConfirmation('update')"
                        class="px-4 py-2 rounded bg-yellow-500 hover:bg-yellow-600 text-white transition">Update</button>
                    <button wire:click="askConfirmation('cancel')"
                        class="px-4 py-2 rounded bg-red-600 hover:bg-red-700 text-white transition">Cancel</button>
                </div>
            @endif
        </div>
    @endif
</div>
