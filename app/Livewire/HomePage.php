<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('DigiRest - Pagina principal')]

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page');
    }
}
