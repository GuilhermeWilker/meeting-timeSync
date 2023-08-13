<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BioTextarea extends Component
{
    public $bio = '';

    public function saveBio()
    {
        auth()->user()->update(['bio' => $this->bio ?: '']);

        $this->bio = '';
    }

    public function render()
    {
        return view('livewire.bio-textarea');
    }
}
