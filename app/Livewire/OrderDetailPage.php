<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Detalles del pedido - DigiRest')]
class OrderDetailPage extends Component
{

    public $order_id;

    public function mount($order_id){
        $this->order_id = $order_id;
    }

    public function render()
    {
        // order_items recibe los items del pedido con la relacion de producto
        $order_items = OrderItem::with('product')->where('order_id', $this->order_id)->get();
        // address recibe la direccion del pedido
        $address = Address::where('order_id', $this->order_id)->first();
        // order recibe el pedido con la relacion de usuario
        $order = Order::where('id', $this->order_id)->first();

        return view('livewire.order-detail-page', [
            'order_items' => $order_items,
            'address' => $address,
            'order' => $order
        ]   );
    }
}
