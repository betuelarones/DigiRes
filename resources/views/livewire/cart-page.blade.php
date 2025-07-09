<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Mi Carrito</h1>
            <p class="text-gray-600">Revisa tus productos antes de continuar</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Productos Section -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                        <h2 class="text-xl font-semibold text-gray-800">Productos</h2>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($cart_items as $item)
                                    <tr wire:key='{{ $item['product_id'] }}' class="hover:bg-gray-50 transition-colors duration-200">
                                        <td class="px-6 py-6">
                                            <div class="flex items-center space-x-4">
                                                <!-- IMAGEN DEL PRODUCTO -->
                                                <div class="flex-shrink-0 w-20 h-20 bg-gray-100 rounded-xl overflow-hidden shadow-md">
                                                    <img class="w-full h-full object-cover" src="{{ url('storage', $item['image']) }}" alt="{{ $item['name'] }}">
                                                </div>
                                                <!-- NOMBRE DEL PRODUCTO -->
                                                <div class="flex-1 min-w-0">
                                                    <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $item['name'] }}</h3>
                                                </div>
                                            </div>
                                        </td>
                                        
                                        <!-- PRECIO -->
                                        <td class="px-6 py-6">
                                            <div class="text-lg font-bold text-gray-900">S/ {{ Number::format($item['unit_amount'], 2) }}</div>
                                        </td>
                                        
                                        <!-- CANTIDAD -->
                                        <td class="px-6 py-6">
                                            <div class="inline-flex items-center bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
                                                <!-- BTN DISMINUIR CANTIDAD-->
                                                <button class="flex items-center justify-center w-10 h-10 bg-gradient-to-r from-gray-50 to-gray-100 hover:from-red-50 hover:to-red-100 text-gray-600 hover:text-red-600 transition-all duration-200 ease-in-out transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50" wire:click='decreaseQty({{ $item['product_id'] }})'>
                                                    <span class="text-lg font-bold">−</span>
                                                </button>
                                                <!-- CANTIDAD del PRODUCTO-->
                                                <span class="flex items-center justify-center w-12 h-10 px-3 text-center font-bold text-gray-800 bg-white select-none">{{ $item['quantity'] }}</span>
                                                <!-- BTN AUMENTAR CANTIDAD-->
                                                <button class="flex items-center justify-center w-10 h-10 bg-gradient-to-r from-gray-100 to-gray-50 hover:from-green-50 hover:to-green-100 text-gray-600 hover:text-green-600 transition-all duration-200 ease-in-out transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50" wire:click='increaseQty({{ $item['product_id'] }})'>
                                                    <span class="text-lg font-bold">+</span>
                                                </button>
                                            </div>
                                        </td>
                                        
                                        <!-- MONTO TOTAL  -->
                                        <td class="px-6 py-6">
                                            <div class="text-lg font-bold text-digirest">S/ {{ Number::format($item['total_amount'], 2) }}</div>
                                        </td>
                                        
                                        <!-- ACCIÓN -->
                                        <td class="px-6 py-6">
                                            <!-- BOTÓN ELIMINAR -->
                                            <button wire:click="removeItem({{ $item['product_id'] }})"
                                                    class="group relative w-12 h-12 bg-gradient-to-r from-gray-100 to-gray-200 border border-gray-300 rounded-xl hover:from-red-500 hover:to-red-600 hover:border-red-600 text-gray-600 hover:text-white flex items-center justify-center transition-all duration-300 ease-in-out transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50 shadow-md hover:shadow-lg" 
                                                    title="Eliminar del carrito">
                                                <!-- Ícono tachito normal -->
                                                <span wire:loading.remove wire:target="removeItem({{ $item['product_id'] }})" class="transition-transform duration-200 group-hover:scale-110">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6l-2 14H7L5 6"></path>
                                                        <path d="M10 11v6"></path>
                                                        <path d="M14 11v6"></path>
                                                    </svg>
                                                </span>
                                                <!-- Ícono tachito animado cuando hace clic -->
                                                <span wire:loading wire:target="removeItem({{ $item['product_id'] }})" class="absolute flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-spin text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6l-2 14H7L5 6"></path>
                                                        <path d="M10 11v6"></path>
                                                        <path d="M14 11v6"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                {{-- @empty sirve para mostrar un mensaje cuando el carrito está vacío --}}
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-16 text-center">
                                            <div class="flex flex-col items-center justify-center space-y-4">
                                                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L15 18m-6 0h6"></path>
                                                    </svg>
                                                </div>
                                                <div class="text-center">
                                                    <h3 class="text-xl font-semibold text-gray-500 mb-2">Tu carrito está vacío</h3>
                                                    <p class="text-gray-400">Añade productos al carrito para solicitar un pedido</p>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Resumen Section -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden sticky top-8">
                    <div class="px-6 py-5 border-b border-gray-200 bg-gradient-to-r from-digirest/10 to-digirest/5">
                        <h2 class="text-xl font-semibold text-gray-800">Resumen del Pedido</h2>
                    </div>
                    
                    <div class="px-6 py-6 space-y-4">
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="text-lg font-semibold text-gray-900">S/ {{ Number::format($grand_total, 2) }}</span>
                        </div>
                        
                        <div class="flex justify-between items-center py-2">
                            <span class="text-gray-600">Delivery</span>
                            <span class="text-lg font-semibold text-green-600">Gratis</span>
                        </div>
                        
                        <div class="border-t border-gray-200 pt-4">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-900">Total</span>
                                <span class="text-2xl font-bold text-digirest">S/ {{ Number::format($grand_total, 2) }}</span>
                            </div>
                        </div>
                        
                        @if ($cart_items)
                            <div class="pt-4">
                                <a wire:navigate href="/verificar" class="btn-click group relative w-full bg-digirest hover:bg-digirestDark text-black font-bold py-4 px-6 rounded-xl transition-all duration-200 ease-in-out transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-digirest focus:ring-opacity-50 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                                    <span>Continuar compra</span>
                                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>