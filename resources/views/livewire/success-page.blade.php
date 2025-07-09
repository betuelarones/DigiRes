<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <!-- Header con ícono de éxito -->
        <div class="text-center mb-8">
            <div class="mx-auto flex items-center justify-center w-16 h-16 bg-green-100 dark:bg-green-800 rounded-full mb-4">
                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                ¡Gracias! Su pedido ha sido recibido
            </h1>
            <p class="text-gray-600 dark:text-gray-400">
                Hemos recibido su pedido y comenzaremos a procesarlo pronto
            </p>
        </div>

        <!-- Tarjeta principal del pedido -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <!-- Información del cliente -->
            <div class="bg-gradient-to-r from-digirestDark to-digirestDark/80 px-6 py-4">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-white">
                            {{ $order->address->full_name }}
                        </h3>
                        <p class="text-white/90 text-sm">
                            <span class="inline-flex items-center mr-4">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $order->address->district }}, {{ $order->address->street_address }}
                            </span>
                        </p>
                        <p class="text-white/90 text-sm mt-1">
                            <span class="inline-flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                {{ $order->address->phone }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Detalles del pedido -->
            <div class="px-6 py-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Número de orden</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            #{{ $order->id }}
                        </p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Fecha</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $order->created_at->format('d-m-Y') }}
                        </p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Total</p>
                        <p class="text-xl font-bold text-digirestDark dark:text-white">
                            S/ {{ Number::format($order->grand_total, 2) }}
                        </p>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">Método de pago</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $order->payment_method }}
                        </p>
                    </div>
                </div>

                <!-- Sección de detalles y envío -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Detalles del pedido -->
                    <div class="space-y-4">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Detalles del pedido
                        </h2>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                                <span class="font-semibold text-gray-900 dark:text-white">
                                    S/ {{ Number::format($order->grand_total, 2) }}
                                </span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600 dark:text-gray-400">Envío</span>
                                <span class="font-semibold text-green-600 dark:text-green-400">
                                    S/ {{ Number::format(0, 2) }}
                                </span>
                            </div>
                            <div class="border-t border-gray-200 dark:border-gray-600 pt-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900 dark:text-white">Total</span>
                                    <span class="text-xl font-bold text-digirestDark dark:text-white">
                                        S/ {{ Number::format($order->grand_total, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de envío -->
                    <div class="space-y-4">
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Información de envío
                        </h2>
                        <div class="bg-gradient-to-r from-digirestDark/10 to-digirestDark/5 dark:from-gray-700 dark:to-gray-600 rounded-lg p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-digirestDark rounded-lg flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-6 h-6 text-white" viewBox="0 0 16 16">
                                                <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Delivery
                                        </p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Entrega rápida
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-green-600 dark:text-green-400">
                                        S/ {{ Number::format(0, 2) }}
                                    </p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Gratis
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botones de acción -->
            <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4">
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="/productos" class="flex-1 sm:flex-none px-6 py-3 bg-white dark:bg-gray-800 text-digirestDark dark:text-white border-2 border-digirestDark dark:border-gray-600 rounded-lg font-semibold text-center hover:bg-digirestDark hover:text-white dark:hover:bg-gray-600 transition-colors duration-200">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5.1M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                        </svg>
                        Seguir comprando
                    </a>
                    <a href="/mis-pedidos" class="flex-1 sm:flex-none px-6 py-3 bg-digirestDark dark:bg-gray-600 text-white rounded-lg font-semibold text-center hover:bg-digirestDark/90 dark:hover:bg-gray-500 transition-colors duration-200">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Ver mi historial
                    </a>
                </div>
            </div>
        </div>

        <!-- Mensaje adicional -->
        <div class="mt-8 text-center">
            <p class="text-gray-600 dark:text-gray-400 mb-2">
                ¿Tienes alguna pregunta sobre tu pedido?
            </p>
            <p class="text-sm text-gray-500 dark:text-gray-500">
                Puedes contactarnos o revisar el estado de tu pedido en cualquier momento
            </p>
        </div>
    </div>
</div>

{{-- @script
<script type="text/javascript">
    document.addEventListener("sweet.success", event => {
        const tipo = event.detail.tipo;
        let title = "Pedido registrado";
        if (tipo === "tarjeta") {
            title = "¡Pago con tarjeta exitoso!";
        }
        Swal.fire({ title, icon: "success", timer: 1500, showConfirmButton: false });
    });
</script>
@endscript --}}