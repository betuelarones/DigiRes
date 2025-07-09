<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Models\Order;
use App\Models\SimulatedPayment;
use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

#[Title('Pago con tarjeta - DigiRest')]
class PaymentCardPage extends Component
{
    public $cardholder;
    public $cardnumber;
    public $expiry;
    public $cvc;
    public $grand_total;

    public function mount()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();

        // Si el carrito está vacío, redirige
        if (count($cart_items) === 0) {
            return redirect('/productos');
        }

        // Si no hay datos de sesión o no es pago con tarjeta, redirige a verificación
        $checkout_data = session('checkout_data');
        if (!$checkout_data || $checkout_data['payment_method'] !== 'tarjeta') {
            return redirect('/verificar');
        }

        // Calcular el monto total a pagar
        $this->grand_total = CartManagement::calculateGrandTotal($cart_items);
    }



    public function submit()
    {
        $this->validate([
            'cardholder' => 'required|string|max:255',
            'cardnumber' => 'required|string|max:19',
            'expiry' => 'required|string|max:5',
            'cvc' => 'required|string|max:3',
        ]);

        $cart_items = CartManagement::getCartItemsFromCookie();
        if (count($cart_items) === 0) {
            return redirect('/productos');
        }

        $checkout_data = session('checkout_data');
        if (!$checkout_data || $checkout_data['payment_method'] !== 'tarjeta') {
            return redirect('/verificar');
        }

        // Guardar orden
        $order = new Order();
        $order->user_id = Auth::id();
        $order->grand_total = $this->grand_total;
        $order->payment_method = 'tarjeta';
        $order->payment_status = 'pagado';
        $order->status = 'new';
        $order->notes = 'Pedido simulado con tarjeta';
        $order->save();

        $order->items()->createMany($cart_items);

        // Guardar dirección
        $address = new Address();
        $address->first_name = $checkout_data['first_name'];
        $address->last_name = $checkout_data['last_name'];
        $address->phone = $checkout_data['phone'];
        $address->district = $checkout_data['district'];
        $address->street_address = $checkout_data['street_address'];
        $address->reference = $checkout_data['reference'];
        $address->order_id = $order->id;
        $address->save();

        // Guardar el pago simulado
        SimulatedPayment::create([
            'order_id' => $order->id,
            'cardholder' => $this->cardholder,
            'cardnumber' => $this->cardnumber,
            'expiry' => $this->expiry,
            'cvc' => $this->cvc,
        ]);

        // Limpiar todo
        CartManagement::clearCartItems();
        session()->forget('checkout_data');

        // Redireccionar
        return redirect()->route('success');
    }

    public function render()
    {
        return view('livewire.payment-card-page');
    }
}
