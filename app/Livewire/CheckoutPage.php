<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Mail\OrderPlaced;
use App\Models\Address;
use App\Models\Order;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Resources\Preference\Item;
use MercadoPago\Exceptions\MPApiException;

#[Title('Verificación de compra - DigiRest')]

class CheckoutPage extends Component
{

    public $first_name;
    public $last_name;
    public $phone;
    public $district;
    public $street_address;
    public $reference;
    public $payment_method;

    // Método que se ejecuta al montar el componente
    // Verifica si hay artículos en el carrito, de lo contrario redirige a la página de productos
    public function mount(){
        $cart_items = CartManagement::getCartItemsFromCookie();
        if(count($cart_items) == 0){
            return redirect('/productos');
        }
    }
    
    

    // Método para validar los datos del formulario de compra
    public function placeOrder(){
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'district' => 'required|string|max:255',
            'street_address' => 'required',
            'reference' => 'nullable',
            'payment_method' => 'required',
        ]);

        $cart_items = CartManagement::getCartItemsFromCookie();

        // Guardar en sesión temporalmente para usar en PaymentCardPage si es tarjeta
        session([
            'checkout_data' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'district' => $this->district,
                'street_address' => $this->street_address,
                'reference' => $this->reference,
                'payment_method' => $this->payment_method,
            ]
        ]);

        if ($this->payment_method === 'tarjeta') {
            return redirect()->route('pago.tarjeta');
        }

        // Solo si es efectivo se guarda directamente
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->grand_total = CartManagement::calculateGrandTotal($cart_items);
        $order->payment_method = $this->payment_method;
        $order->payment_status = 'pendiente';
        $order->status = 'new';
        $order->notes = 'Pedido realizado por ' . Auth::user()->name;
        $order->save();

        $address = new Address();
        $address->first_name = $this->first_name;
        $address->last_name = $this->last_name;
        $address->phone = $this->phone;
        $address->district = $this->district;
        $address->street_address = $this->street_address;
        $address->reference = $this->reference;
        $address->order_id = $order->id;
        $address->save();

        $order->items()->createMany($cart_items);
        CartManagement::clearCartItems();

        // Enviar confirmación del pedido al correo
        Mail::to(request()->user())->send(new OrderPlaced($order));

        return redirect()->route('success');
    }

    public function render()
    {
        $cart_items = CartManagement::getCartItemsFromCookie();
        $grand_total = CartManagement::calculateGrandTotal($cart_items);
        return view('livewire.checkout-page', [
            'cart_items' => $cart_items,
            'grand_total' => $grand_total,
        ]);
    }
}
