<div class="space-y-6">
    <div>
        <label for="doctor" class="block mb-2 text-sm font-medium">Select a Doctor:</label>
        <select id="doctor" wire:model.live="selectedDoctorId" class="border rounded p-2 w-full">
            <option value="">Select a doctor</option>
            @foreach ($this->doctors as $doc)
                <option value="{{ $doc->id }}">
                    {{ $doc->first_name }} {{ $doc->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    @if ($selectedDoctorId)
        <livewire:appointment-calendar :doctor-id="$selectedDoctorId" :available-dates="$this->availableDates->ToArray()" :selected-date="$selectedDate"
            wire:key="'calendar-'.$selectedDoctorId" />
    @endif

    @if ($selectedDoctorId && $selectedDate)
        <livewire:timeslot-list :doctor-id="$selectedDoctorId" :date="$selectedDate" />
    @endif
</div>
