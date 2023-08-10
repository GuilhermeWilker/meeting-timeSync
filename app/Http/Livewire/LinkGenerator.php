<?php

namespace App\Http\Livewire;

use Illuminate\Support\Str;
use Livewire\Component;

class LinkGenerator extends Component
{
    public $guestLink;
    public $linkGenerated = false;

    /**
     * |                                             |
     * | Gera um link único para enviar ao convidado |
     * |                                             |.
     *
     * O link gerado é armazenado na propriedade guestLink da classe
     * e a flag linkGenerated é definida como verdadeira.
     */
    public function generateGuestLink()
    {
        // Gerando string aleatória de até 10 caracteres
        $randomString = Str::random(10);

        // Construindo o link utilizando query params --> site.com?invite_guest=BhYiIGDp2
        $this->guestLink = route('guest.view',
            ['invite_guest' => $randomString]);

        $this->linkGenerated = true;
    }

    public function render()
    {
        return view('livewire.link-generator');
    }
}
