<div class=" w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center">
        <main class="w-full max-w-md mx-auto p-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-leckerli text-gray-1000 dark:text-white">DigiRest</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                ¿Aún no tienes cuenta?
                <a wire:navigate class="text-digirestDark decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/registrar">
                    Registrate aquí
                </a>
                </p>
            </div>

            <hr class="my-5 border-slate-300">

            <!-- Form -->
            <form wire:submit.prevent='save'>

                {{-- ALERTA DE CREDENCIALES INCORRECTAS --}}
                @if (session('error'))
                    <div
                        wire:key="login-error-{{ now()->timestamp }}"
                        x-data="{ show: true }"
                        x-show="show"
                        x-init="setTimeout(() => show = false, 4000)"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="mb-4 flex items-center space-x-2 bg-red-600 text-white px-4 py-2 rounded-lg shadow-md"
                        role="alert"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-12.728 12.728M5.636 5.636l12.728 12.728" />
                        </svg>
                        <span class="text-sm">{{ session('error') }}</span>
                    </div>
                @endif

                <div class="grid gap-y-4">
                <!-- Form Group -->
                <div>
                    <label for="email" class="block text-sm mb-2 dark:text-white">Correo Electrónico</label>
                    <div class="relative">
                    <input type="email" id="email" wire:model="email" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" aria-describedby="email-error">
                    @error('email')
                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                            <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg>
                        </div>
                    @enderror
                    </div>
                    @error('email')
                        <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Form Group -->

                <!-- Form Group -->
                <div>
                    <div class="flex justify-between items-center">
                    <label for="password" class="block text-sm mb-2 dark:text-white">Contraseña</label>
                    {{-- <a wire:navigate class="text-sm text-digirestDark decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/contraseña-olvidada">¿Olvidaste tu contraseña?</a> --}}
                    </div>
                    <div class="relative">
                    <input type="password" id="password" wire:model="password" class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600" aria-describedby="password-error">
                    @error('password')
                        <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none pe-3">
                            <svg class="h-5 w-5 text-red-500" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                            </svg>
                        </div>
                    @enderror
                    </div>
                    @error('password')
                        <p class="text-xs text-red-600 mt-2" id="email-error">{{ $message }}</p>
                    @enderror
                </div>
                <!-- End Form Group -->
                <button type="submit" class="btn-click font-bold w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm rounded-lg border border-transparent 
                bg-digirest text-black hover:bg-digirestDark disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                Iniciar Sesión
                </button>
                </div>
            </form>
            <!-- End Form -->
            </div>
        </div>
    </div>
</div>