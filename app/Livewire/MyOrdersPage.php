<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Mis pedidos - DigiRest')]

class MyOrdersPage extends Component
{
    use WithPagination;

    public function render()
    {
        // Obtenemos los pedidos del usuario que inició sesión actualmente
        $my_orders = Order::where('user_id', Auth::user()->id)
        ->latest()
        ->paginate(6);
        return view('livewire.my-orders-page', [
            'orders' => $my_orders,
        ]);
    }
}
