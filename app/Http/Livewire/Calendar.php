<?php

namespace App\Http\Livewire;

use App\Mail\MeetingScheduled;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Calendar extends Component
{
    public int $year;
    public int $month;
    public array $weeks = [];
    public ?User $user = null;
    public ?string $guestLink = null;
    public bool $linkGenerated = false;
    public array $unavailableDates = [];
    public bool $isModalOpen = false;

    public string $selectedDate = '';
    public string $visitorName = '';
    public string $visitorEmail = '';

    protected $listeners = ['guestLinkGenerated' => 'updateUnavailableDates'];

    public function openModal(string $date): void
    {
        $this->selectedDate = $date;
        $this->isModalOpen = true;
    }

    public function closeModal(): void
    {
        $this->isModalOpen = false;
        $this->selectedDate = '';
        $this->visitorName = '';
        $this->visitorEmail = '';
    }

    public function scheduleMeeting(): void
    {
        if ($this->user) {
            $this->scheduleMeetingEmail();
        }

        $this->closeModal();
    }

    private function scheduleMeetingEmail(): void
    {
        $meetingDate = \Carbon\Carbon::createFromFormat('Y-m-d', $this->selectedDate)->format('F j, Y');
        $organizerEmail = $this->user->email;

        Mail::to($this->user->email)->send(new MeetingScheduled($this->visitorName, $this->visitorEmail, $meetingDate, $organizerEmail, $this->user));
        Mail::to($this->visitorEmail)->send(new MeetingScheduled($this->visitorName, $this->visitorEmail, $meetingDate, $organizerEmail, $this->user));
    }

    public function mount(?int $organizerId = null): void
    {
        if (auth()->check()) {
            $this->user = auth()->user();
            $this->guestLink = $this->user->guest_link;
            $this->linkGenerated = true;
        }

        // Se o usuário for convidado e houver um organizador, defina-o
        if (!$this->user && $organizerId) {
            $this->user = User::find($organizerId);
        }

        $today = now();
        $this->year = $today->year;
        $this->month = $today->month;

        $this->generateCalendar();
    }

    private function generateCalendar(): void
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
        $firstDayOfMonth = date('w', strtotime($this->year.'-'.$this->month.'-01'));

        $this->weeks = [];
        $currentWeek = 0;

        // Preencher dias vazios no início do mês (se necessário)
        for ($day = 0; $day < $firstDayOfMonth; ++$day) {
            $this->weeks[$currentWeek][] = null;
        }

        for ($day = 1; $day <= $daysInMonth; ++$day) {
            $date = $this->year.'-'.$this->month.'-'.str_pad($day, 2, '0', STR_PAD_LEFT);

            // Check if the date is unavailable for the current user
            $isUnavailable = $this->user
                ->unavailableDates()
                ->where('date', $date)->exists();

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

    public function markDateUnavailable(string $date): void
    {
        if (auth()->check()) {
            $dateEntry = auth()->user()
                ->unavailableDates()
                ->where('date', $date)->first();

            $dateEntry
                ? $dateEntry->delete()
                : auth()->user()
                    ->unavailableDates()
                    ->create(['date' => $date]);

            $this->generateCalendar();
        }
    }

    public function updateUnavailableDates(array $unavailableDates): void
    {
        $this->unavailableDates = $unavailableDates;
        $this->generateCalendar();
    }

    public function render(): \Illuminate\View\View
    {
        $unavailableDates = auth()->check()
        ? auth()->user()
            ->unavailableDates
            ->pluck('date')->toArray()
        : [];

        return view('livewire.calendar', [
            'unavailableDates' => $unavailableDates,
        ]);
    }
}
