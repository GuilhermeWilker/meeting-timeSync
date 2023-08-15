<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class LinkGenerator extends Component
{
    public object $user;
    public string $guestLink = '';
    public bool $linkGenerated = false;

    public function generateGuestLink(): void
    {
        if (auth()->check()) {
            $this->user = $user = auth()->user();

            if (!$user->guest_link) {
                $this->generateAndSaveGuestLink($user);
            }

            $this->updatePropertiesWithUser($user);
            $this->emitUnavailableDatesToGuestCalendar($user);
        }
    }

    public function mount(): void
    {
        if (auth()->check()) {
            $this->user = auth()->user();
        }
    }

    public function render()
    {
        return view('livewire.link-generator');
    }

    private function generateAndSaveGuestLink(object $user): void
    {
        $randomString = Str::random(10);
        $randomStringOrganizer = Str::random(3);

        $guestLink = route('guest.view', [
            'organizer' => $randomStringOrganizer.$user->id,
            'invite' => $randomString,
        ]);

        $user->update([
            'guest_link' => $guestLink,
        ]);
    }

    private function updatePropertiesWithUser(object $user): void
    {
        $this->guestLink = $user->guest_link;
        $this->linkGenerated = true;
    }

    private function emitUnavailableDatesToGuestCalendar(object $user): void
    {
        $unavailableDates = $user->unavailableDates
            ->pluck('date')
            ->toArray();

        $this->emit('guestLinkGenerated', $unavailableDates);
    }
}
