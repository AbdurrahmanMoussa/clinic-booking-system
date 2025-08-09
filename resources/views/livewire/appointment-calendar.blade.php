<div class="grid grid-flow-row grid-cols-4 gap-6">
    <div class="col-span-4 md:col-span-2 lg:col-span-1">
        <div class="flex items-center justify-center gap-4 text-zinc-800 dark:text-zinc-100 mb-4">
            <button wire:click="previousMonth" class="hover:text-blue-600 dark:hover:text-blue-400 transition">
                <x-icon name="chevron-left" class="w-5 h-5" />
            </button>

            <span class="text-lg font-semibold tracking-wide">
                {{ $this->monthName }} {{ $year }}
            </span>

            <button wire:click="nextMonth" class="hover:text-blue-600 dark:hover:text-blue-400 transition">
                <x-icon name="chevron-right" class="w-5 h-5" />
            </button>
        </div>

        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow p-4">
            <div class="grid grid-cols-7 gap-1 text-center font-medium text-sm text-zinc-700 dark:text-zinc-300 mb-2">
                @foreach ($this->daysOfWeek as $day)
                    <div class="w-10 h-10 flex items-center justify-center">
                        {{ $day[0] }}
                    </div>
                @endforeach
            </div>

            @foreach ($this->calendarGrid as $week)
                <div class="grid grid-cols-7 gap-1 justify-items-center text-sm mb-1">
                    @foreach ($week as $day)
                        @if ($day)
                            @php
                                $dateString = \Illuminate\Support\Carbon::create($year, $month, $day)->toDateString();
                                $isAvailable = in_array($dateString, $this->availableDates, true);
                                $isSelected = $this->selectedDate === $dateString;
                            @endphp

                            <div class="w-9 h-9 flex items-center justify-center rounded-full
    {{ $isAvailable ? 'cursor-pointer hover:bg-blue-200 dark:hover:bg-blue-700 text-zinc-900 dark:text-white' : 'text-zinc-400' }}
    {{ $isSelected ? 'bg-blue-600 text-white' : '' }}"
                                @if ($isAvailable) wire:click="selectDay({{ $day }})" @endif>
                                {{ $day }}
                            </div>
                        @else
                            <div class="w-9 h-9"></div>
                        @endif
                    @endforeach
                </div>
            @endforeach

            <p class="mt-4 text-sm text-zinc-600 dark:text-zinc-400">
                Selected: <span class="font-medium">{{ $selectedDate }}</span>
            </p>
        </div>
    </div>
</div>
