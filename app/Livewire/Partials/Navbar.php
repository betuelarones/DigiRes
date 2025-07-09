<?php

namespace App\Livewire\Partials;

use App\Helpers\CartManagement;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{

    public $total_count = 0; // Conteo de los items del carrito

    // Método para obtener el conteo
    public function mount()
    {
        $this->total_count = count(CartManagement::getCartItemsFromCookie());
    }

    // Método para escuchar el evento de añadir al carrito.
    #[On('update-cart-count')]
    public function updateCartCount($total_count){
        $this->total_count = $total_count;
    }


    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
