<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="overflow-hidden bg-gradient-to-br from-gray-50 to-white py-16 font-poppins dark:bg-gradient-to-br dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl px-4 py-8 mx-auto lg:py-12 md:px-6">

        <div class="flex flex-wrap -mx-4">
            <!-- Galería de imágenes -->
            <div class="w-full mb-12 md:w-1/2 md:mb-0" x-data="{ mainImage: '{{ url('storage', $product->images[0]) }}' }">
                <div class="sticky top-4 z-40 overflow-hidden">
                    <!-- Imagen principal -->
                    <div class="relative mb-6 lg:mb-10 bg-white dark:bg-gray-800 rounded-2xl shadow-2xl overflow-hidden group">
                        <img x-bind:src="mainImage" alt="{{ $product->name }}" 
                            class="w-full transition-transform duration-500 ease-in-out group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        <!-- Badge de producto -->
                        <div class="absolute top-4 left-4">
                            <span class="bg-digirest text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                                Disponible
                            </span>
                        </div>
                    </div>
                    
                    <!-- Miniaturas -->
                    <div class="flex flex-wrap gap-3 md:gap-4">
                        @foreach ($product->images as $image)
                        <div class="w-20 h-20 md:w-24 md:h-24 lg:w-28 lg:h-28" 
                            x-on:click="mainImage='{{ url('storage', $image) }}'">
                            <img src="{{ url('storage', $image) }}" alt="{{ $product->name }}" 
                                class="object-cover w-full h-full rounded-xl cursor-pointer border-2 border-gray-200 dark:border-gray-600 hover:border-digirest dark:hover:border-digirest transition-all duration-300 hover:shadow-lg transform hover:scale-105">
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Información de envío -->
                    <div class="mt-8 p-6 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-2xl border border-green-200 dark:border-green-800">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 w-12 h-12 bg-green-100 dark:bg-green-800 rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" 
                                    class="text-green-600 dark:text-green-400 bi bi-truck" viewBox="0 0 16 16">
                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-green-800 dark:text-green-400">Compra libre</h3>
                                <p class="text-sm text-green-600 dark:text-green-300">Envío gratuito disponible</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Información del producto -->
            <div class="w-full px-4 md:w-1/2">
                <div class="lg:pl-8">
                    <!-- Header del producto -->
                    <div class="mb-8 space-y-4">
                        
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 lg:text-4xl leading-tight">
                            {{ $product->name }}
                        </h1>
                        
                        <div class="flex items-baseline gap-4">
                            <span class="text-4xl font-bold text-digirest lg:text-5xl">
                                S/ {{ $product->price }}
                            </span>
                            {{-- <span class="text-xl font-medium text-gray-500 line-through dark:text-gray-400">
                                S/ 25.00
                            </span>
                            <span class="px-2 py-1 bg-red-100 text-red-800 text-sm font-medium rounded-full">
                                -20%
                            </span> --}}
                        </div>
                        
                        <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">
                            {{ $product->description }}
                        </p>
                    </div>
                    
                    <!-- Selector de cantidad -->
                    <div class="w-36 mb-8 ">
                    <label for="" class="w-full pb-1 text-xl font-semibold text-gray-700 border-b border-digirest dark:border-gray-600 dark:text-gray-400">Cantidad</label>
                    
                    <div class="relative flex flex-row w-full h-12 mt-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <button wire:click='decreaseQty' class="w-20 h-full text-gray-600 dark:text-gray-400 bg-gradient-to-r from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 hover:from-red-50 hover:to-red-100 dark:hover:from-red-900/20 dark:hover:to-red-800/20 hover:text-red-600 dark:hover:text-red-400 transition-all duration-200 ease-in-out transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                            <span class="m-auto text-2xl font-medium">−</span>
                        </button>
                        <input type="number" wire:model="quantity" readonly class="flex items-center w-full font-bold text-center text-gray-800 dark:text-gray-200 placeholder-gray-500 dark:placeholder-gray-400 bg-gradient-to-b from-gray-50 to-white dark:from-gray-800 dark:to-gray-900 outline-none focus:outline-none text-lg selection:bg-blue-200 dark:selection:bg-blue-800" placeholder="1">
                        <button wire:click='increaseQty' class="w-20 h-full text-gray-600 dark:text-gray-400 bg-gradient-to-r from-gray-100 to-gray-50 dark:from-gray-800 dark:to-gray-700 hover:from-green-50 hover:to-green-100 dark:hover:from-green-900/20 dark:hover:to-green-800/20 hover:text-green-600 dark:hover:text-green-400 transition-all duration-200 ease-in-out transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                            <span class="m-auto text-2xl font-medium">+</span>
                        </button>
                    </div>
                </div>
                    
                    <!-- Botón de compra -->
                    <div class="space-y-4">
                        <button wire:click.prevent='addToCart({{ $product->id }})' 
                            class="w-full lg:w-auto lg:px-12 py-4 bg-gradient-to-r from-digirest to-digirest/90 hover:from-digirest/90 hover:to-digirest text-white font-bold text-lg rounded-2xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover:scale-105 active:scale-95 transition-all duration-300 ease-in-out focus:outline-none focus:ring-4 focus:ring-digirest/30 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                            <span wire:loading.remove wire:target='addToCart({{ $product->id }})' class="flex items-center justify-center gap-3">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m4.5-5v6m0-6l2.5 5m-2.5-5l-2.5 5"/>
                                </svg>
                                Añadir al carrito
                            </span>
                            <span wire:loading wire:target='addToCart({{ $product->id }})' class="flex items-center justify-center gap-3">
                                <svg class="animate-spin w-5 h-5" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>

<!--------------- SWEET ALERT PARA EL CARRITO ----------------->
@script
<script type="text/javascript">
    document.addEventListener("sweet.success", event => {
        Swal.fire({
            toast:true,
            position:"bottom",
            icon: "success",
            title: "¡Producto agregado al carrito exitosamente!",
            showConfirmButton: false,
            timer: 2000
        });
    });
</script>
@endscript