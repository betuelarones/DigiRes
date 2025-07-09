{{-- resources/views/filament/widgets/admin-dashboard-grouped.blade.php --}}

<div class="space-y-12 w-full">

    {{-- 🎯 Pedidos --}}
    <section class="w-full bg-gray-50 dark:bg-transparent rounded-lg p-6 mb-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">📦 Pedidos</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6">
            @foreach ($orderStats as $stat)
                <div class="flex flex-col items-start p-4 bg-white dark:bg-gray-900 rounded-lg shadow hover:shadow-md transition-shadow">
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $stat['label'] }}</span>
                    <span class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $stat['count'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

    {{-- 🎯 Reservas --}}
    <section class="w-full bg-gray-50 dark:bg-transparent rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 mb-6">📅 Reservas</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($reservationStats as $stat)
                <div class="flex flex-col items-start p-4 bg-white dark:bg-gray-900 rounded-lg shadow hover:shadow-md transition-shadow">
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $stat['label'] }}</span>
                    <span class="text-3xl font-bold text-gray-900 dark:text-gray-100 mt-2">{{ $stat['count'] }}</span>
                </div>
            @endforeach
        </div>
    </section>

</div>
