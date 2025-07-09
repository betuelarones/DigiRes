<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        
        <!-- Header Section -->
        <div class="mb-8">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-2">Productos</h1>
            <p class="text-gray-600 dark:text-gray-400">Descubre nuestra amplia variedad de platillos</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4 space-y-6">
                
                <!-- Categories Filter -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                    <div class="flex items-center mb-6">
                        <svg class="w-5 h-5 text-digirest mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Categorías</h2>
                    </div>
                    
                    <div class="space-y-3">
                        @foreach ($categories as $category)
                        <div class="flex items-center group" wire:key="{{ $category->id }}">
                            <input 
                                type="checkbox" 
                                wire:model.live="selected_categories" 
                                id="{{ $category->slug }}" 
                                value="{{ $category->id }}" 
                                class="w-4 h-4 text-digirest bg-white border-2 border-gray-300 rounded focus:ring-digirest focus:ring-2 dark:bg-gray-700 dark:border-gray-600 transition-all duration-200">
                            <label 
                                for="{{ $category->slug }}" 
                                class="ml-3 text-gray-700 dark:text-gray-300 cursor-pointer group-hover:text-digirest transition-colors duration-200">
                                {{ $category->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Stock Filter -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                    <div class="flex items-center mb-6">
                        <svg class="w-5 h-5 text-digirest mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v4a2 2 0 002 2h2m0-6h8a2 2 0 012 2v4a2 2 0 01-2 2h-2m-6 0v6m0-6h6v6"></path>
                        </svg>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Disponibilidad</h2>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center group">
                            <input 
                                type="radio" 
                                name="stock" 
                                id="stock-1" 
                                wire:model.live="stock" 
                                value="1"
                                class="w-4 h-4 text-digirest bg-white border-2 border-gray-300 focus:ring-digirest focus:ring-2 dark:bg-gray-700 dark:border-gray-600 transition-all duration-200">
                            <label 
                                for="stock-1" 
                                class="ml-3 text-gray-700 dark:text-gray-300 cursor-pointer group-hover:text-digirest transition-colors duration-200">
                                Disponibles
                            </label>
                        </div>
                        
                        <div class="flex items-center group">
                            <input 
                                type="radio" 
                                name="stock" 
                                id="stock-0" 
                                wire:model.live="stock" 
                                value="0"
                                class="w-4 h-4 text-digirest bg-white border-2 border-gray-300 focus:ring-digirest focus:ring-2 dark:bg-gray-700 dark:border-gray-600 transition-all duration-200">
                            <label 
                                for="stock-0" 
                                class="ml-3 text-gray-700 dark:text-gray-300 cursor-pointer group-hover:text-digirest transition-colors duration-200">
                                No disponibles
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:w-3/4">
                
                <!-- Sort Controls -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-4 mb-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path>
                            </svg>
                            <span class="text-gray-700 dark:text-gray-300 font-medium">Ordenar por:</span>
                        </div>
                        <select 
                            wire:model.live="sort" 
                            class="bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white rounded-lg px-4 py-2 focus:ring-2 focus:ring-digirest focus:border-digirest transition-all duration-200"
                        >
                            <option value="latest">Más recientes</option>
                            <option value="price">Precio</option>
                        </select>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    @foreach ($products as $product)
                    <div class="group bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2" wire:key="{{ $product->id }}">
                        
                        <!-- Product Image -->
                        <div class="relative overflow-hidden bg-gray-100 dark:bg-gray-700 aspect-square">
                            @if($product->in_stock)
                                <a wire:navigate href="/productos/{{ $product->slug }}" class="block h-full">
                                    <img
                                        src="{{ url('storage', $product->images[0]) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    />
                                </a>
                                <div class="absolute top-3 right-3">
                                    <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                                        Disponible
                                    </span>
                                </div>
                            @else
                                <div class="block h-full relative">
                                    <img
                                        src="{{ url('storage', $product->images[0]) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover opacity-50"
                                    />
                                    <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-30">
                                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">
                                            Proximamente
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Product Info -->
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-2">
                                {{ $product->name }}
                            </h3>
                            <p class="text-2xl font-bold text-digirest mb-4">
                                S/ {{ number_format($product->price, 2) }}
                            </p>
                            
                            <!-- Add to Cart Button -->
                            @if($product->in_stock)
                                <button 
                                    wire:click.prevent='addToCart({{ $product->id }})' 
                                    class="w-full bg-digirest hover:bg-digirest/90 text-white font-medium py-3 px-4 rounded-lg transition-all duration-200 flex items-center justify-center space-x-2 group-hover:shadow-lg transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>
                                        Añadir al carrito
                                    </span>
                                    <span wire:loading wire:target='addToCart({{ $product->id }})' class="flex items-center">
                                        <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </span>
                                </button>
                            @else
                                <button 
                                    disabled
                                    class="w-full bg-gray-300 dark:bg-gray-600 text-gray-500 dark:text-gray-400 font-medium py-3 px-4 rounded-lg cursor-not-allowed flex items-center justify-center space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <span>No disponible</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 p-6">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<!--------------- SWEET ALERT PARA EL CARRITO ----------------->
@script
<script type="text/javascript">
    document.addEventListener("sweet.success", event => {
        Swal.fire({
            toast: true,
            position: "bottom-end",
            icon: "success",
            title: "¡Añadido exitosamente!",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true
        });
    });
</script>
@endscript