<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Reactive;

class AppointmentCalendar extends Component
{
    public $month;

    public $year;

    public array $availableDates = [];
    #[Reactive]
    public ?string $selectedDate = null;

    public $months =   [
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

    public $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    public $doctorId;

    public function mount($doctorId)
    {
        $this->doctorId = $doctorId;
        $this->month = Carbon::now()->month;
        $this->year = Carbon::now()->year;
    }
    public function updatedSelectedDate($value)
    {
        $this->selectedDate = $value;
    }

    public function getCalendarGridProperty()
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

    public function previousMonth()
    {
        if ($this->month == 1) {
            $this->month = 12;
            $this->year--;
        } else {
            $this->month--;
        }
    }

    public function nextMonth()
    {
        if ($this->month == 12) {
            $this->month = 1;
            $this->year++;
        } else {
            $this->month++;
        }
    }

    public function getMonthNameProperty()
    {
        return $this->months[$this->month];
    }

    public function selectDay($day)
    {
        $date = Carbon::create($this->year, $this->month, $day)->toDateString();
        $this->dispatch('day-selected', date: $date);
    }

    public function render()
    {
        return view('livewire.appointment-calendar');
    }
}
