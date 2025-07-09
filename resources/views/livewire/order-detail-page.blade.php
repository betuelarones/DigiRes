<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-700 mb-8">Detalles del pedido</h1>

    <!-- Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-5">
        <!-- Card Cliente -->
        <div class="flex flex-col bg-white border-0 shadow-lg rounded-xl dark:bg-slate-900 dark:border-gray-800 hover:shadow-xl transition-shadow duration-300">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-lg shadow-sm">
                    <svg class="flex-shrink-0 size-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400 font-medium">
                            Cliente
                        </p>
                    </div>
                    <div class="mt-2 font-semibold text-gray-800 dark:text-gray-200">
                        {{ $address->full_name }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card Fecha -->
        <div class="flex flex-col bg-white border-0 shadow-lg rounded-xl dark:bg-slate-900 dark:border-gray-800 hover:shadow-xl transition-shadow duration-300">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-lg shadow-sm">
                    <svg class="flex-shrink-0 size-5 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 22h14" />
                        <path d="M5 2h14" />
                        <path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22" />
                        <path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400 font-medium">
                            Fecha del pedido
                        </p>
                    </div>
                    <div class="mt-2 font-semibold text-gray-800 dark:text-gray-200">
                        {{ $order_items[0]->created_at->format('d-m-Y') }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card Estado Pedido -->
        <div class="flex flex-col bg-white border-0 shadow-lg rounded-xl dark:bg-slate-900 dark:border-gray-800 hover:shadow-xl transition-shadow duration-300">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-lg shadow-sm">
                    <svg class="flex-shrink-0 size-5 text-purple-600 dark:text-purple-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6" />
                        <path d="m12 12 4 10 1.7-4.3L22 16Z" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400 font-medium">
                            Estado del pedido
                        </p>
                    </div>
                    <div class="mt-2 flex items-center gap-x-2">
                        @php
                            $status = '';
                                if ($order->status == 'new') {
                                    $status = 'Nuevo';
                                } elseif ($order->status == 'processing') {
                                    $status = 'En Proceso';
                                } elseif ($order->status == 'shipped') {
                                    $status = 'Enviado';
                                } elseif ($order->status == 'delivered') {
                                    $status = 'Entregado';
                                } elseif ($order->status == 'canceled') {
                                    $status = 'Cancelado';
                                }
                        @endphp

                        <span class="bg-gradient-to-r from-yellow-400 to-yellow-500 py-1.5 px-3 rounded-full text-black font-semibold shadow-md text-sm">
                            {{ $status }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->

        <!-- Card Estado Pago -->
        <div class="flex flex-col bg-white border-0 shadow-lg rounded-xl dark:bg-slate-900 dark:border-gray-800 hover:shadow-xl transition-shadow duration-300">
            <div class="p-4 md:p-5 flex gap-x-4">
                <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-gradient-to-br from-orange-50 to-orange-100 dark:from-orange-900/20 dark:to-orange-800/20 rounded-lg shadow-sm">
                    <svg class="flex-shrink-0 size-5 text-orange-600 dark:text-orange-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z" />
                        <path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                        <path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2" />
                        <path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2" />
                    </svg>
                </div>

                <div class="grow">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-400 font-medium">
                            Estado del pago
                        </p>
                    </div>
                    <div class="mt-2 flex items-center gap-x-2">
                        @php
                            $payment_status = '';
                            if ($order->payment_status == 'pendiente') {
                                $payment_status = 'Pendiente';
                            } elseif ($order->payment_status == 'pagado') {
                                $payment_status = 'Pagado';
                            } elseif ($order->payment_status == 'fallado') {
                                $payment_status = 'Fallido';
                            } 
                        @endphp

                        <span class="bg-gradient-to-r from-yellow-400 to-yellow-500 py-1.5 px-3 rounded-full text-black font-semibold shadow-md text-sm">
                            {{ $payment_status }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->
    </div>
    <!-- End Grid -->

    <div class="flex flex-col xl:flex-row gap-6 mt-8">
        <div class="xl:w-3/4 space-y-6">
            <!-- Tabla de productos -->
            <div class="bg-white overflow-x-auto rounded-xl shadow-lg border-0 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Productos del pedido</h2>
                <table class="w-full">
                    <thead>
                        <tr class="border-b-2 border-gray-100">
                            <th class="text-left font-semibold text-gray-700 py-3">Producto</th>
                            <th class="text-left font-semibold text-gray-700 py-3">Precio unitario</th>
                            <th class="text-left font-semibold text-gray-700 py-3">Cantidad</th>
                            <th class="text-left font-semibold text-gray-700 py-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_items as $item)
                        <tr wire:key="{{ $item->id }}" class="border-b border-gray-50 hover:bg-gray-50 transition-colors duration-200">
                            <td class="py-4">
                                <div class="flex items-center">
                                    <img class="h-16 w-16 mr-4 rounded-lg object-cover shadow-sm" src="{{ url('storage', $item->product->images[0]) }}" alt="{{ $item->product->name }}">
                                    <span class="font-semibold text-gray-800">{{ $item->product->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 text-gray-700">S/ {{ Number::format($item->unit_amount, 2) }}</td>
                            <td class="py-4">
                                <span class="bg-gray-100 px-3 py-1 rounded-full text-sm font-medium text-gray-700">{{ $item->quantity }}</span>
                            </td>
                            <td class="py-4 font-semibold text-gray-800">S/ {{ Number::format($item->total_amount, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Dirección de envío -->
            <div class="bg-white rounded-xl shadow-lg border-0 p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Dirección de envío</h2>
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">{{ $address->district }}</p>
                            <p class="text-gray-600">{{ $address->street_address }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Teléfono</p>
                            <p class="font-semibold text-gray-800">{{ $address->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resumen de boleta -->
        <div class="xl:w-1/4">
            <div class="bg-white rounded-xl shadow-lg border-0 p-6 sticky top-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Resumen de Boleta</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-semibold text-gray-800">S/ {{ Number::format($item->order->grand_total, 2) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Envío</span>
                        <span class="font-semibold text-green-600">S/ {{ Number::format(0, 2) }}</span>
                    </div>
                    <hr class="my-4 border-gray-200">
                    <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg">
                        <span class="text-lg font-bold text-gray-800">Total</span>
                        <span class="text-lg font-bold text-gray-800">S/ {{ Number::format($item->order->grand_total, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>