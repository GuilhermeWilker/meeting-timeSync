<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Calendar extends Component
{
    public $year;
    public $month;
    public $weeks = [];
    public $user;
    public $guestLink;
    public $linkGenerated;
    public $unavailableDates;

    protected $listeners = ['guestLinkGenerated' => 'updateUnavailableDates'];

    public function mount($organizer = null)
    {
        if (auth()->check()) {
            $this->user = auth()->user();
            $this->guestLink = $this->user->guest_link;
            $this->linkGenerated = true;
        }

        // Se o usuário for convidado e houver um organizador, defina-o
        if (!$this->user && $organizer) {
            $this->user = $organizer;
        }

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
            $date = $this->year.'-'.$this->month.'-'.str_pad($day, 2, '0', STR_PAD_LEFT);

            // Check if the date is unavailable for the current user
            $isUnavailable = auth()->check() && $this->user->unavailableDates()->where('date', $date)->exists();
            $isAvailable = auth()->guest() || !$isUnavailable;

            $this->weeks[$currentWeek][] = [
                'day' => $day,
                'date' => $date,
                'isUnavailable' => $isUnavailable,
                'isAvailable' => $isAvailable,
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
        if (auth()->check()) {
            $dateEntry = auth()->user()->unavailableDates()->where('date', $date)->first();

            if ($dateEntry) {
                $dateEntry->delete();
            } else {
                auth()->user()->unavailableDates()->create(['date' => $date]);
            }

            $this->generateCalendar();
        }
    }

    public function updateUnavailableDates($unavailableDates)
    {
        $this->unavailableDates = $unavailableDates;
        $this->generateCalendar();
    }

   public function render()
   {
       $unavailableDates = [];
       if (auth()->check()) {
           $unavailableDates = auth()->user()->unavailableDates->pluck('date')->toArray();
       }

       return view('livewire.calendar', [
           'unavailableDates' => $unavailableDates,
       ]);
   }
}
