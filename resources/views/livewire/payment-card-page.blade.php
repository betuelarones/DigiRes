<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl border border-gray-200 p-8 w-full max-w-lg backdrop-blur-sm">
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-digirest/10 rounded-full mb-4">
                <svg class="w-8 h-8 text-digirest" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Información de pago</h2>
            <p class="text-gray-600 text-sm">Completa los datos de tu tarjeta de forma segura</p>
        </div>

        {{-- Formulario Livewire --}}
        <form wire:submit.prevent="submit" class="space-y-6">

            {{-- Nombre del titular --}}
            <div class="space-y-2">
                <label for="cardholder" class="block text-sm font-semibold text-gray-800">
                    Nombre del titular
                </label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400 group-focus-within:text-digirest transition-colors duration-200" 
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <input wire:model="cardholder" type="text" id="cardholder" name="cardholder"
                        placeholder="Juan Pérez"
                        class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-digirest/20 focus:border-digirest transition-all duration-200 ease-in-out text-gray-900 placeholder-gray-400 hover:border-gray-300"
                        required>
                    @error('cardholder') 
                        <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            {{-- Número de tarjeta --}}
            <div class="space-y-2">
                <label for="cardnumber" class="block text-sm font-semibold text-gray-800">
                    Número de tarjeta
                </label>
                <div class="relative group">
                    <input wire:model="cardnumber" type="text" id="cardnumber" name="cardnumber" oninput="formatCardNumber(this)"
                        placeholder="1234 5678 9012 3456" maxlength="19"
                        class="w-full px-4 py-3.5 pr-16 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-digirest/20 focus:border-digirest transition-all duration-200 ease-in-out text-gray-900 placeholder-gray-400 hover:border-gray-300"
                        required>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
                        <img src="/images/tarjeta.png" alt="Visa" class="h-8 w-auto opacity-80">
                    </div>
                    @error('cardnumber') 
                        <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> 
                    @enderror
                </div>
            </div>

            {{-- Fecha y CVC --}}
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <label for="expiry" class="block text-sm font-semibold text-gray-800">
                        Fecha de vencimiento
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-digirest transition-colors duration-200" 
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input wire:model="expiry" type="text" id="expiry" name="expiry" placeholder="MM/AA" maxlength="5" oninput="formatExpiry(this)"
                            class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-digirest/20 focus:border-digirest transition-all duration-200 ease-in-out text-gray-900 placeholder-gray-400 hover:border-gray-300"
                            required>
                        @error('expiry') 
                            <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="cvc" class="block text-sm font-semibold text-gray-800">
                        CVC
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-digirest transition-colors duration-200" 
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <input wire:model="cvc" type="text" id="cvc" name="cvc" placeholder="123" maxlength="3"
                            class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-digirest/20 focus:border-digirest transition-all duration-200 ease-in-out text-gray-900 placeholder-gray-400 hover:border-gray-300"
                            required>
                        @error('cvc') 
                            <span class="text-red-500 text-sm mt-1 block font-medium">{{ $message }}</span> 
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Botón --}}
            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-digirest text-white py-4 px-6 rounded-xl font-semibold text-lg hover:bg-digirest/90 active:bg-digirest/80 focus:outline-none focus:ring-4 focus:ring-digirest/30 transition-all duration-200 ease-in-out shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 active:translate-y-0 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none">
                    <span wire:loading.remove class="flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Pagar S/ {{ number_format($grand_total, 2) }}
                    </span>
                    <span wire:loading class="flex justify-center items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Procesando pago...
                    </span>
                </button>
            </div>
        </form>

        {{-- Seguridad --}}
        <div class="mt-8 pt-6 border-t border-gray-100">
            <div class="flex items-center justify-center text-sm text-gray-500">
                <div class="flex items-center bg-green-50 px-3 py-2 rounded-full">
                    <svg class="w-4 h-4 mr-2 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium text-green-700">Pago encriptado</span>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function formatCardNumber(input) {
        let value = input.value.replace(/\D/g, ''); // Solo números
        value = value.substring(0, 16); // Máximo 16 dígitos
        const formatted = value.match(/.{1,4}/g)?.join(' ') || '';
        input.value = formatted;
    }
    function formatExpiry(input) {
        let value = input.value.replace(/\D/g, ''); // Solo números
        if (value.length >= 3) {
            value = value.substring(0, 4); // Máximo 4 dígitos
            value = value.replace(/(\d{2})(\d{1,2})/, '$1/$2');
        }
        input.value = value;
    }
</script>
