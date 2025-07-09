<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Detalles del producto - DigiRest')]

class ProductDetailPage extends Component
{
    public $slug;
    public $quantity = 1; 


    public function increaseQty(){    // Método para incrementar la cantidad de cada producto en una unidad
        // Limita la cantidad máxima a 10 unidades
        if ($this->quantity < 10) {
            $this->quantity++;
        }
    }

    public function decreaseQty(){     // Método para disminuir la cantidad de cada producto en una unidad
        if($this->quantity > 1){
            $this->quantity--;
        }
    }

    // Función para añadir el producto al carrito
    public function addToCart($product_id){
        $total_count = CartManagement::addItemToCartWithQty($product_id, $this->quantity);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
        $this->dispatch("sweet.success");
    }

    public function mount($slug){
        $this->slug = $slug;
    }

    public function render()
    {
        return view('livewire.product-detail-page', [
            'product' => Product::where('slug', $this->slug)->firstOrFail(),
        ]);
    }
}
