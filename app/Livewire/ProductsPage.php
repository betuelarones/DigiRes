<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Productos - DigiRest')]

class ProductsPage extends Component
{

    use WithPagination;  // para usar Paginate.

    #[Url]
    public $selected_categories = []; // Categorias seleccionada

    #[Url(keep: true)]
    public $stock=1; // 1 = Disponible, 0 = No disponible
    
    #[Url]
    public $sort='latest';  // filtro para ordenar, por defecto en "Ordenar por último."


    // Función para añadir el producto al carrito
    public function addToCart($product_id){
        $total_count = CartManagement::addItemToCart($product_id);

        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
        $this->dispatch("sweet.success");
    }

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);  // Consulta a la base de datos, que productos están activos.

        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories); // Filtrar productos por categorías seleccionadas.
        }

        // Condicional para la disponibilidad de productos 1 (disponible) y 0 (no disponible).
        if ($this->stock == 1) {
            $productQuery->where('in_stock', 1);
        } elseif ($this->stock == 0) {
            $productQuery->where('in_stock', 0);
        }

        
        if ($this->sort == 'latest'){  // Si el atributo sort tiene el valor latest
            $productQuery->latest();   // Ordernar por último
        }

        if ($this->sort == 'price'){          // Si el atributo sort tiene el valor de price
            $productQuery->orderBy('price');  // Ordenar por precio
        }
        
        return view('livewire.products-page', [
            'products' => $productQuery->paginate(6), // Para la cantidad de elementos(productos) que se mostraran en cada página. 
            'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
        ]);
    }
}
