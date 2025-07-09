<header class="flex z-50 sticky top-0 flex-wrap md:justify-start md:flex-nowrap w-full bg-black text-sm nav-link-prop py-3 md:py-0 dark:bg-gray-800 shadow-md">
    <nav class="max-w-[85rem] w-full mx-auto px-4 md:px-6 lg:px-8" aria-label="Global">
        <div class="relative md:flex md:items-center md:justify-between">
        <div class="flex items-center justify-between">
            
            <a wire:navigate class="nav-logo select-none text-white" href="/" aria-label="Logo" >Digi<span class="span1-logo">Rest</span></a>

            <div class="md:hidden">
            <button type="button" class="hs-collapse-toggle flex justify-center items-center w-9 h-9 text-sm font-semibold rounded-lg border border-gray-200 text-white hover:bg-digirestDark disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:border-gray-70bg-gray-700" data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation" aria-label="Toggle navigation">
                <svg class="hs-collapse-open:hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" x2="21" y1="6" y2="6" />
                <line x1="3" x2="21" y1="12" y2="12" />
                <line x1="3" x2="21" y1="18" y2="18" />
                </svg>
                <svg class="hs-collapse-open:block hidden flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18" />
                <path d="m6 6 12 12" />
                </svg>
            </button>
            </div>
        </div>

        <div id="navbar-collapse-with-animation" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block">
            <div class="overflow-hidden overflow-y-auto max-h-[80vh]  [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500">
            <div class="select-none py-4 flex flex-col gap-x-0 mt-5 divide-y divide-dashed divide-black md:flex-row md:items-center md:justify-end md:gap-x-7 md:mt-0 md:ps-7 md:divide-y-0 md:divide-solid dark:divide-gray-700">
                
                <a wire:navigate class="nav-link-prop {{ request()->is('/') ? 'text-digirest':'text-[#d7d7d7]'}}" href="/" aria-current="page">
                Inicio
                </a>

                <a wire:navigate class=" nav-link-prop {{ request()->is('categorias') ? 'text-digirest':'text-[#d7d7d7]'}}" href="/categorias">
                Categorías
                </a>

                <a wire:navigate class=" nav-link-prop {{ request()->is('productos') ? 'text-digirest':'text-[#d7d7d7]'}}" href="/productos">
                Productos
                </a>

                <a wire:navigate class=" nav-link-prop {{ request()->is('reservas') ? 'text-digirest':'text-[#d7d7d7]'}}" href="/reservas">
                Reservas
                </a>

                <a wire:navigate class="nav-link-prop flex items-center {{ request()->is('carrito') ? 'text-digirest':'text-[#d7d7d7]'}}" href="/carrito">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386a.75.75 0 0 1 .728.577L5.67 8.25H19.5a.75.75 0 0 1 .733.937l-1.5 6A.75.75 0 0 1 18 15H7.174a.75.75 0 0 1-.728-.577L4.5 5.25m0 0L3.386 3.577A.75.75 0 0 0 2.25 3M6 21a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm12 0a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                    </svg>
                    <span class="mr-1">Carrito</span>
                    <span class="py-0.5 px-1.5 rounded-full text-xs bg-digirest border border-digirestDark text-black">{{ $total_count }}</span>
                </a>

                @guest
                    <div class="pt-3 md:pt-0 me-1">
                        <a wire:navigate class="nav-btn" href="/iniciar-sesion">
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                            <circle cx="12" cy="7" r="4" />
                            </svg>
                            Iniciar Sesión
                        </a>
                    </div>
                @endguest

                @auth
                    <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] md:[--trigger:hover] md:py-4">
                        <button type="button" class="flex items-center w-full text-gray-500 hover:text-gray-400 font-medium dark:text-gray-400 dark:hover:text-gray-500">
                            {{ auth()->user()->name }}
                        <svg class="ms-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                        </svg>
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 md:w-48 hidden z-10 bg-white md:shadow-md rounded-lg p-2 dark:bg-gray-800 md:dark:border dark:border-gray-700 dark:divide-gray-700 before:absolute top-full md:border before:-top-5 before:start-0 before:w-full before:h-5">
                        <a wire:navigate class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" 
                            href="/mis-pedidos">
                            Mis pedidos
                        </a>

                        {{-- <a wire:navigate class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" 
                            href="#">
                            Mi cuenta
                        </a> --}}
                        <a wire:navigate class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" 
                            href="logout">
                            Cerrar sesión
                        </a>
                        </div>
                    </div>
                @endauth
            </div>
            </div>
        </div>
        </div>
    </nav>
</header>