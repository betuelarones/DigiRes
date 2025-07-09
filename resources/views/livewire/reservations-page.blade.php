<div class="bg-gray-50 min-h-screen p-4">
    <div class="max-w-7xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-black text-white p-6">
            <h1 class="text-3xl font-bold text-center">Reserva tu Mesa</h1>
            <p class="text-gray-300 text-center mt-2">Completa los datos y selecciona tu mesa preferida</p>
        </div>

        {{-- @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">¡Éxito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">¡Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif --}}

        <form wire:submit.prevent="createReservation">
            <div class="flex flex-col lg:flex-row min-h-[600px]">
                <!-- Panel Izquierdo - Formulario ----------------------------------------->
                <div class="w-full lg:w-1/2 p-6 border-r border-gray-200">
                    <!-- Formulario de datos personales -->
                    <section aria-labelledby="personal-data-heading" class="mb-8">
                        <h2 id="personal-data-heading" class="text-2xl font-semibold mb-6 text-black flex items-center">
                            <svg class="w-6 h-6 text-digirest mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Datos de la Reserva
                        </h2>
                        
                        <div class="space-y-4">
                            <!-- Nombre Completo -->
                            <div>
                                <label for="fullName" class="block text-sm font-medium text-gray-700 mb-2">Nombre Completo *</label>
                                <input wire:model.lazy="customer_name" type="text" id="fullName" name="fullName" required aria-required="true"
                                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:ring-4 focus:ring-digirest focus:border-digirest transition-colors text-lg"
                                    placeholder="Ingresa tus nombres y apellidos">
                                @error('customer_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            </div>
                            <!-- Teléfono -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Teléfono o Celular*</label>
                                <input wire:model.lazy="customer_phone" type="tel" id="phone" name="phone" required aria-required="true"
                                    class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:ring-4 focus:ring-digirest focus:border-digirest transition-colors text-lg"
                                    placeholder="+51 999 999 999">
                                @error('customer_phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Fecha -->
                                <div>
                                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Fecha *</label>
                                    <input wire:model.lazy="date" type="date" id="date" name="date" required aria-required="true"
                                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:ring-4 focus:ring-digirest focus:border-digirest transition-colors text-lg">
                                    @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <!-- Nº de Comensales -->
                                <div>
                                    <label for="guests" class="block text-sm font-medium text-gray-700 mb-2">Nº de Comensales *</label>
                                    <select wire:model.lazy="guests" id="guests" name="guests" required aria-required="true"
                                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:ring-4 focus:ring-digirest focus:border-digirest transition-colors text-lg">
                                        <option value="">Seleccionar</option>
                                        <option value="1" class="hover:bg-digirest hover:text-digirest">1 persona</option>
                                        <option value="2">2 personas</option>
                                        <option value="3">3 personas</option>
                                        <option value="4">4 personas</option>
                                        <option value="5">5 personas</option>
                                        <option value="6">6 personas</option>
                                        <option value="7">7 personas</option>
                                        <option value="8">8 personas</option>
                                    </select>
                                    @error('guests') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                <!-- Hora Inicio -->
                                <div>
                                    <label for="startTime" class="block text-sm font-medium text-gray-700 mb-2">Hora Inicio *</label>
                                    <input wire:model.lazy="start_time" type="time" id="startTime" name="startTime" required aria-required="true"
                                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:ring-4 focus:ring-digirest focus:border-digirest transition-colors text-lg">
                                    @error('start_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                                </div>

                                <!-- Hora Fin -->
                                <div>
                                    <label for="endTime" class="block text-sm font-medium text-gray-700 mb-2">Hora Fin *</label>
                                    <input wire:model.lazy="end_time" type="time" id="endTime" name="endTime" required aria-required="true"
                                        class="w-full px-4 py-3 border border-gray-400 rounded-lg focus:ring-4 focus:ring-digirest focus:border-digirest transition-colors text-lg">
                                    @error('end_time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- Panel Izquierdo - Formulario FIN----------------------------------------->

                <!-- Panel Derecho - Selección de Mesas -->
                <div class="w-full lg:w-1/2 p-6 bg-gray-50 {{ !$formComplete ? 'pointer-events-none opacity-50' : '' }}">
                    <!-- Filtro de pisos -->
                    <section aria-labelledby="floor-filter-heading" class="mb-6 select-none">
                        <h3 id="floor-filter-heading" class="text-2xl font-semibold mb-4 text-black flex items-center">
                            <svg class="w-6 h-6 text-digirest mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h12M9 7h6m-6 4h6m-6 4h6"/>
                            </svg>
                            Selecciona el Piso
                        </h3>
                        @if (!$formComplete)
                            <div class="text-red-600 text-sm mt-2 mb-2">
                                ⚠️ Completa todos los datos del formulario para habilitar la selección de mesa.
                            </div>
                        @endif
                        <div class="flex gap-3">
                            <button 
                                type="button" 
                                wire:click="setFloor('1')"
                                class="floor-filter flex-1 px-6 py-3 rounded-lg border-2 hover:border-digirest font-bold transition-colors text-lg
                                    {{ $floor === '1' ? 'bg-digirest border-digirest text-black' : 'bg-white border-gray-400 text-gray-700' }}">
                                Primer Piso
                            </button>

                            <button 
                                type="button" 
                                wire:click="setFloor('2')"
                                class="floor-filter flex-1 px-6 py-3 rounded-lg border-2 hover:border-digirest font-bold transition-colors text-lg
                                    {{ $floor === '2' ? 'bg-digirest border-digirest text-black' : 'bg-white border-gray-400 text-gray-700' }}">
                                Segundo Piso
                            </button>
                        </div>
                    </section>

                    <!-- Grid de mesas -->
                    <section aria-labelledby="tables-heading" class="mb-6 select-none">
                        <h3 id="tables-heading" class="text-xl font-semibold mb-4 text-black flex items-center">
                            <svg class="w-5 h-5 text-digirest mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Mesas Disponibles
                        </h3>
                        
                        <div class="mb-4 flex items-center gap-6 text-sm">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-green-500 mr-2"></div>
                                <span class="text-gray-700">Disponible</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-red-500 opacity-60 mr-2"></div>
                                <span class="text-gray-700">Ocupada</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded-full bg-digirest mr-2"></div>
                                <span class="text-gray-700">Seleccionada</span>
                            </div>
                        </div>
                        
                        <div id="tables-grid" class="grid grid-cols-3 sm:grid-cols-4 gap-4">
                            @foreach ($tables as $table)
                                @php
                                    $isOccupied = $table->status === 'occupied';
                                    $isSelected = $selectedTable === $table->id;
                                    $show = ($floor === '1' && $table->location === 'primer_piso') || 
                                            ($floor === '2' && $table->location === 'segundo_piso');
                                @endphp

                                @if ($show)
                                    <button 
                                        type="button"
                                        wire:click="{{ $isSelected ? 'deselectTable()' : 'selectTable(' . $table->id . ')' }}"
                                        class="w-24 h-24 rounded-full border-3
                                            flex flex-col items-center justify-center group shadow-lg
                                            focus:outline-none focus:ring-2 focus:ring-digirest
                                            {{ $isSelected ? 'ring-4 ring-gold ring-offset-2' : '' }}
                                            {{ $isOccupied && !$isSelected ? 'border-red-400 bg-red-50 opacity-60 cursor-not-allowed' : 'border-green-400 bg-green-50 hover:bg-green-100 hover:border-green-500 hover:scale-105 transition-all duration-200' }}"
                                        {{ $isOccupied && !$isSelected ? 'disabled' : '' }}
                                        aria-label="Mesa {{ $table->code }} para {{ $table->capacity }} personas, {{ $isOccupied ? 'ocupada' : 'disponible' }}">
                                        
                                        <span class="text-sm font-bold {{ $isOccupied ? 'text-red-700' : 'text-green-700 group-hover:text-green-800' }}">
                                            {{ $table->code }}
                                        </span>
                                        <div class="flex items-center mt-1">
                                            <svg class="w-4 h-4 {{ $isOccupied ? 'text-red-600' : 'text-green-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                                            </svg>
                                            <span class="text-sm {{ $isOccupied ? 'text-red-600' : 'text-green-600' }} ml-1 font-semibold">
                                                {{ $table->capacity }}
                                            </span>
                                        </div>
                                    </button>
                                @endif
                            @endforeach
                        </div>


                    </section>
                </div>
            </div>

            <!-- Sección de Resumen y Botón - Centrada abajo -->
            <div class="w-full p-6 border-t border-gray-200 bg-white">
                <!-- Resumen de la reserva -->
                <section aria-labelledby="summary-heading" class="mb-6 max-w-2xl mx-auto">
                    <h3 id="summary-heading" class="text-xl font-semibold mb-4 text-black text-center flex items-center justify-center">
                        <svg class="w-5 h-5 text-digirest mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Resumen de Reserva
                    </h3>
                    <div id="reservation-summary" class="bg-gray-50 p-6 rounded-lg border-2 border-dashed border-gray-400">
                        @if ($selectedTable)
                            <div>
                                <p class="font-bold text-digirest">Mesa: {{ $tables->find($selectedTable)->code ?? '' }}</p>
                                <p>Capacidad: {{ $tables->find($selectedTable)->capacity ?? '' }} personas</p>
                            </div>
                        @else
                            <div class="text-gray-500 text-center">
                                <p>Selecciona una mesa para ver el resumen</p>
                            </div>
                        @endif

                    </div>
                </section>

                <!-- Botón de reserva -->
                <div class="text-center max-w-md mx-auto">
                    <button 
                        type="submit"
                        class="btn-click w-full px-8 py-4 rounded-lg font-bold text-xl transition-all duration-200
                            {{ $canSubmitReservation ? 'bg-digirest hover:bg-digirestDark text-black' : 'bg-gray-300 text-gray-500 cursor-not-allowed' }}"
                        {{ $canSubmitReservation ? '' : 'disabled' }}>
                        <span wire:loading.remove wire:target="createReservation">Reservar Ahora</span>
                        <span wire:loading class="flex justify-center items-center gap-2">
                            <svg class="h-5 w-5 text-black animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.5 12a7.5 7.5 0 0113.115-4.623M19.5 12a7.5 7.5 0 01-13.115 4.623M19.5 12H16.5m3 0l-1.5 1.5m1.5-1.5l-1.5-1.5" />
                            </svg>
                        </span>
                    </button>

                    <p id="reserve-btn-help" class="text-sm text-gray-500 mt-3">
                        Completa todos los campos y selecciona una mesa para continuar
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

@script
<script type="text/javascript">
    document.addEventListener("sweet.success", event => {
        Swal.fire({
            icon: "success",
            title: "¡Reserva realizada exitosamente!",
            showConfirmButton: false,
            timer: 3000
        });
    });

    document.addEventListener("sweet.error", event => {
        Swal.fire({
            icon: "error",
            title: "¡Reserva no completada!",
            text: event.detail.message || "Ocurrió un error al procesar tu reserva. Verifica la disponibilidad de la mesa y los datos ingresados.",
            confirmButtonColor: '#d33'
        });
    });
    document.addEventListener("form.validation.failed", (event) => {
        Swal.fire({
            icon: "warning",
            title: "Campos incompletos o inválidos",
            text: "Por favor corrige los campos marcados en rojo antes de continuar.",
            confirmButtonColor: '#f59e0b'
        });
    });
</script>
@endscript


