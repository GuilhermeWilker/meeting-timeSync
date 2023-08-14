<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class LinkGenerator extends Component
{
    public $user;
    public $guestLink;
    public $linkGenerated = false;

    public function generateGuestLink()
    {
        if (auth()->check()) {
            $user = auth()->user();

            if (!$user->guest_link) {
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

            $this->user = $user;
            $this->guestLink = $user->guest_link;
            $this->linkGenerated = true;

            // Pass the unavailableDates to the Calendar component
            $this->emit('guestLinkGenerated', $user->unavailableDates->pluck('date')->toArray());
        }
    }

    public function mount()
    {
        if (auth()->check()) {
            $this->user = auth()->user();
            $this->guestLink = $this->user->guest_link;
            $this->linkGenerated = true;
        }
    }

    public function render()
    {
        return view('livewire.link-generator');
    }
}
