<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Reactive;

class AppointmentCalendar extends Component
{
    public int $month;
    public int $year;

    #[Reactive]
    public ?string $selectedDate = null;

    #[Reactive]
    public int $doctorId;

    public array $availableDates = [];

    public array $months = [
        1 => 'January',
        2 => 'February',
        3 => 'March',
        4 => 'April',
        5 => 'May',
        6 => 'June',
        7 => 'July',
        8 => 'August',
        9 => 'September',
        10 => 'October',
        11 => 'November',
        12 => 'December',
    ];

    public array $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    public function mount(int $doctorId): void
    {
        $this->doctorId = $doctorId;
        $now = Carbon::now();
        $this->month = $now->month;
        $this->year = $now->year;
    }

    public function updatedSelectedDate($value): void
    {
        $this->selectedDate = $value;
    }

    #[Computed]
    public function calendarGrid(): array
    {
        $currentDate = Carbon::create($this->year, $this->month, 1);
        $days = [];
        $daysInMonth = $currentDate->daysInMonth;
        $firstWeekDay = $currentDate->dayOfWeek;

        for ($i = 0; $i < $firstWeekDay; $i++) {
            $days[] = null;
        }

        for ($i = 1; $i <= $daysInMonth; $i++) {
            $days[] = $i;
        }

        return array_chunk($days, 7);
    }

    #[Computed]
    public function monthName(): string
    {
        return $this->months[$this->month] ?? 'Unknown';
    }

    public function previousMonth(): void
    {
        if ($this->month === 1) {
            $this->month = 12;
            $this->year--;
        } else {
            $this->month--;
        }
    }

    public function nextMonth(): void
    {
        if ($this->month === 12) {
            $this->month = 1;
            $this->year++;
        } else {
            $this->month++;
        }
    }

    public function selectDay(int $day): void
    {
        $date = Carbon::create($this->year, $this->month, $day)->toDateString();
        $this->dispatch('day-selected', date: $date);
    }

    public function render()
    {
        return view('livewire.appointment-calendar');
    }
}
