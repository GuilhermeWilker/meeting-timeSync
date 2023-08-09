<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class LinkGenerator extends Component
{
    public $guestLink;
    public $linkGenerated = false;

    public function generateGuestLink()
    {
        $randomString = Str::random(10);
        $this->guestLink = route('guest.view', ['invite' => $randomString]);
        $this->linkGenerated = true;
    }

    public function render()
    {
        return view('livewire.link-generator');
    }
}
