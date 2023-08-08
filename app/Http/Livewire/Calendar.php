<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $year;
    public $month;
    public $weeks = [];
    public $unavailableDates = []; // array de datas selecionadas como indisponíveis.

    public function mount()
    {
        $today = now();
        $this->year = $today->year;
        $this->month = $today->month;

        $this->generateCalendar();
    }

    private function generateCalendar()
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $firstDayOfMonth = date('w', strtotime($this->year.'-'.$this->month.'-01'));

        $this->weeks = [];
        $currentWeek = 0;

        // Adicionar dias vazios no início do mês (se necessário)
        for ($day = 0; $day < $firstDayOfMonth; ++$day) {
            $this->weeks[$currentWeek][] = null;
        }

        for ($day = 1; $day <= $daysInMonth; ++$day) {
            $this->weeks[$currentWeek][] = [
                'day' => $day,
                'date' => $this->year.'-'.$this->month.'-'.str_pad($day, 2, '0', STR_PAD_LEFT),
            ];
            if (count($this->weeks[$currentWeek]) === 7) {
                ++$currentWeek;
            }
        }

        // Preencher dias vazios no final do mês (se necessário)
        while (count($this->weeks[$currentWeek]) < 7) {
            $this->weeks[$currentWeek][] = null;
        }
    }

    public function markDateUnavailable($date)
    {
        in_array($date, $this->unavailableDates)
            ? $this->unavailableDates = array_diff($this->unavailableDates, [$date])
            : $this->unavailableDates[] = $date;
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
