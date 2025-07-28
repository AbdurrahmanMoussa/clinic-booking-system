<div class="grid grid-flow-row grid-cols-4">
    <div class="grid">
        <div class="flex align-items-center gap-4">
            <button wire:click="previousMonth" class="hover:cursor-pointer">
                <x-icon name="chevron-left" class="w-5 h-5" />
            </button>

            <span class="text-lg font-medium">
                {{ $this->monthName }} {{ $year }}
            </span>

            <button wire:click="nextMonth" class="hover:cursor-pointer">
                <x-icon name="chevron-right" class="w-5 h-5" />
            </button>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-7 text-center font-bold mb-2 bg-gray-100 dark:bg-gray-500 justify-items-center">
                @foreach ($this->daysOfWeek as $day)
                    <div class="w-12 h-10 flex items-center justify-center">
                        {{ $day[0] }}
                    </div>
                @endforeach
            </div>

            @foreach ($this->calendarGrid as $week)
                <div class="grid grid-cols-7 gap-1 text-center mb-1 justify-items-center">
                    @foreach ($week as $day)
                        @if ($day)
                            @php
                                $dateString = \Illuminate\Support\Carbon::create($year, $month, $day)->toDateString();
                                $isAvailable = in_array($dateString, $availableDates);
                                $isSelected = $selectedDate === $dateString;
                            @endphp
                            <div class="w-12 h-12 flex items-center justify-center rounded-full text-center
                        {{ $isAvailable ? 'text-black hover:bg-blue-200 cursor-pointer' : 'text-gray-400' }}
                        {{ $isSelected ? 'bg-blue-500 text-white' : '' }}"
                                @if ($isAvailable) wire:click="selectDay({{ $day }})" @endif>
                                {{ $day }}
                            </div>
                        @else
                            <div class="w-12 h-12"></div>
                        @endif
                    @endforeach
                </div>
            @endforeach
            <p>Selected: {{ $selectedDate }}</p>
        </div>
    </div>
</div>
