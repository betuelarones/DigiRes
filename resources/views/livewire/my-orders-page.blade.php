<div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white flex items-center">
                        <svg class="w-8 h-8 mr-3 text-digirestDark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 00-2 2v2m0 0V9a2 2 0 012-2m0 0V7a2 2 0 012-2h12a2 2 0 012 2v2M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2"></path>
                        </svg>
                        Mis Pedidos
                    </h1>
                    <p class="text-gray-600 dark:text-gray-400 mt-2">
                        Revisa el historial y estado de todos tus pedidos
                    </p>
                </div>
                <div class="hidden sm:flex items-center space-x-2">
                    <span class="text-sm text-gray-500 dark:text-gray-400">Total de pedidos:</span>
                    <span class="bg-digirestDark text-white px-3 py-1 rounded-full text-sm font-semibold">
                        {{ $orders->total() }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Tarjeta principal -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <!-- Vista móvil - Cards -->
            <div class="block md:hidden">
                <div class="p-4 space-y-4">
                    @foreach ($orders as $order)
                    @php
                        $status = '';
                        $payment_status = '';
                        $status_color = '';
                        $payment_color = '';
                        
                        if ($order->status == 'new') {
                            $status = 'Nuevo';
                            $status_color = 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200';
                        } elseif ($order->status == 'processing') {
                            $status = 'En Proceso';
                            $status_color = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200';
                        } elseif ($order->status == 'shipped') {
                            $status = 'Enviado';
                            $status_color = 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200';
                        } elseif ($order->status == 'delivered') {
                            $status = 'Entregado';
                            $status_color = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
                        } elseif ($order->status == 'canceled') {
                            $status = 'Cancelado';
                            $status_color = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200';
                        }

                        if ($order->payment_status == 'pendiente') {
                            $payment_status = 'Pendiente';
                            $payment_color = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200';
                        } elseif ($order->payment_status == 'pagado') {
                            $payment_status = 'Pagado';
                            $payment_color = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
                        } elseif ($order->payment_status == 'fallado') {
                            $payment_status = 'Fallido';
                            $payment_color = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200';
                        }
                    @endphp

                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600" wire:key="{{ $order->id }}">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="font-semibold text-gray-900 dark:text-white">
                                    Pedido #{{ $order->id }}
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $order->created_at->format('d-m-Y') }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-digirestDark dark:text-white">
                                    S/ {{ Number::format($order->grand_total, 2) }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $status_color }}">
                                {{ $status }}
                            </span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $payment_color }}">
                                {{ $payment_status }}
                            </span>
                        </div>
                        
                        <div class="flex justify-end">
                            <a href="/mis-pedidos/{{ $order->id }}" class="inline-flex items-center px-4 py-2 bg-digirestDark text-white text-sm font-medium rounded-lg hover:bg-digirestDark/90 transition-colors duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Ver detalles
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Vista desktop - Tabla -->
            <div class="hidden md:block">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-200 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        <span>Pedido</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a4 4 0 118 0v4m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"></path>
                                        </svg>
                                        <span>Fecha</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Estado del pedido</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <span>Estado del pago</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        <span>Monto total</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($orders as $order)
                            @php
                                $status = '';
                                $payment_status = '';
                                $status_color = '';
                                $payment_color = '';
                                
                                if ($order->status == 'new') {
                                    $status = 'Nuevo';
                                    $status_color = 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200';
                                } elseif ($order->status == 'processing') {
                                    $status = 'En Proceso';
                                    $status_color = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200';
                                } elseif ($order->status == 'shipped') {
                                    $status = 'Enviado';
                                    $status_color = 'bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200';
                                } elseif ($order->status == 'delivered') {
                                    $status = 'Entregado';
                                    $status_color = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
                                } elseif ($order->status == 'canceled') {
                                    $status = 'Cancelado';
                                    $status_color = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200';
                                }

                                if ($order->payment_status == 'pendiente') {
                                    $payment_status = 'Pendiente';
                                    $payment_color = 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200';
                                } elseif ($order->payment_status == 'pagado') {
                                    $payment_status = 'Pagado';
                                    $payment_color = 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200';
                                } elseif ($order->payment_status == 'fallado') {
                                    $payment_status = 'Fallido';
                                    $payment_color = 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200';
                                }
                            @endphp

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150" wire:key="{{ $order->id }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-8 h-8 bg-digirestDark/10 rounded-full flex items-center justify-center">
                                            <span class="text-sm font-semibold text-digirestDark">#</span>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $order->id }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-white font-medium">
                                        {{ $order->created_at->format('d-m-Y') }}
                                    </div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $order->created_at->format('H:i') }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $status_color }}">
                                        {{ $status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $payment_color }}">
                                        {{ $payment_status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900 dark:text-white">
                                        S/ {{ Number::format($order->grand_total, 2) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="/mis-pedidos/{{ $order->id }}" class="inline-flex items-center px-4 py-2 bg-digirestDark text-white text-sm font-medium rounded-lg hover:bg-digirestDark/90 transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Ver detalles
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paginación -->
            <div class="bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600">
                {{ $orders->links() }}
            </div>
        </div>

        <!-- Mensaje cuando no hay pedidos -->
        @if($orders->isEmpty())
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-12 text-center">
            <div class="mx-auto w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-6">
                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 9a2 2 0 00-2 2v2m0 0V9a2 2 0 012-2m0 0V7a2 2 0 012-2h12a2 2 0 012 2v2M7 7V5a2 2 0 012-2h6a2 2 0 012 2v2"></path>
                </svg>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                No tienes pedidos aún
            </h3>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Cuando realices tu primer pedido, aparecerá aquí
            </p>
            <a href="/productos" class="inline-flex items-center px-6 py-3 bg-digirestDark text-white font-medium rounded-lg hover:bg-digirestDark/90 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.1 5.1M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                </svg>
                Comenzar a comprar
            </a>
        </div>
        @endif
    </div>
</div>