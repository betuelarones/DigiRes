<div>
        <!---------------------- SECCION INICIO ------------------>
        <div class="section-container-1 w-full"> 
            <div class="section1 mx-auto max-w-[85rem] px-4 sm:px-6 lg:px-8 
                    grid grid-cols-1 md:grid-cols-2 gap-8 items-center
                    min-h-[calc(100vh-4.5rem)]">
                <!-- TEXTO -->
                <div class="space-y-6 select-none">
                    <h1
                        class="text-3xl sm:text-4xl lg:text-6xl font-leckerli text-white leading-tight text-center md:text-left">
                        Ven y disfruta de la mejor gastronomía <span class="text-digirest"></span>
                    </h1>
                    <div class="features-container flex flex-col space-y-4 px-4 items-center md:items-start">
                    <p class="feature-item flex items-center gap-x-2 text-base md:text-lg text-gray-300">
                        <svg class="w-6 h-6 text-digirest" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Recibe tus platillos favoritos en la puerta de tu casa y disfruta del verdadero sabor.
                    </p>
                    <p class="feature-item flex items-center gap-x-2 text-base md:text-lg text-gray-300">
                        <svg class="w-5 h-5 text-digirest" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Descubre un menú variado y delicioso solo aquí, en DigiRest.
                    </p>
                    <p class="feature-item flex items-center gap-x-2 text-base md:text-lg text-gray-300">
                        <svg class="w-6 h-6 text-digirest" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        Realiza tus reservas de manera sencilla y rápida para vivir una experiencia inolvidable.
                    </p>
                    </div>

                    <div class="mt-4 flex flex-wrap gap-4 justify-center md:justify-start px-4">
                    <a wire:navigate href="/reservas"
                        class="inline-flex items-center py-3 px-6 text-sm font-semibold rounded-lg border-2 transition duration-300 border-digirest bg-digirest text-black hover:bg-transparent hover:text-white hover:scale-105">
                        Reservar mesa
                        <svg class="inline-block ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M9 18l6-6-6-6"></path>
                        </svg>
                    </a>
                    <a href="#contacto"
                        class="inline-flex items-center py-3 px-6 text-sm font-medium rounded-lg border-2 transition duration-300 border-white bg-white text-black hover:bg-transparent hover:text-white hover:scale-105">
                        Contacto
                    </a>
                    </div>
                </div>

                <!-- IMAGEN -->
                <div class="container-padre flex justify-center md:justify-end overflow-hidden ">
                    <div class="container-hijo">
                        <img src="/images/robot-chef-v2.png" alt="Robot-Chef"
                    class="chef-img w-full h-auto object-contain rounded-lg shadow-md" />
                    </div>
                </div>
            </div>
        </div>
        <!---------------------- FIN DE SECCION INICIO ------------------>


    <!----------------------SECTION BIENVENIDOS ------------------>
        <section class="section-container-2 min-h-screen flex items-center justify-center py-10 px-4 relative overflow-hidden">
            <!-- Decorative background element -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-primary/5 to-transparent rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-blue-500/5 to-transparent rounded-full blur-3xl transform -translate-x-1/2 translate-y-1/2"></div>
            
            <div class="max-w-6xl mx-auto w-full">
                <div class="flex flex-col items-center justify-center text-center space-y-6">
                    
                    <!-- Contenido de texto centrado arriba -->
                    <div class="max-w-xl mx-auto">
                        <div class="text-center ">
                            <div class="relative flex flex-col items-center mb-6">
                                <h1 class="text-3xl sm:text-4xl lg:text-5xl  font-leckerli dark:text-gray-200 text-white">
                                Bienvenidos a Digi<span class="text-digirest">Rest</span> </h1>
                            </div>
                            <div class="w-24 h-1 bg-digirest mx-auto mt-4 rounded-full"></div>
                            <p class="mt-3 text-base text-center text-gray-300">
                            En DigiRest, llevamos la experiencia gastronómica al siguiente nivel. Realiza tus reservas fácilmente, recibe tus platos favoritos con nuestro servicio de delivery, y descubre una amplia variedad de productos pensados para ti.</p>
                        </div>
                    </div>
                    
                    <!-- Grid de tarjetas centrado abajo -->
                    <div class="w-full max-w-5xl">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <!-- Card 1: Menú Digital -->
                        <a wire:navigate href="reservas" class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 card-shadow-menu h-80">
                            <div class="relative w-full h-full overflow-hidden">
                                <img src="/images/restaurant.jpg" 
                                    alt="Reservas en línea" 
                                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                                
                                <!-- Overlay con gradiente -->
                                <div class="absolute inset-0 overlay-gradient opacity-80 group-hover:opacity-90 transition-opacity duration-400"></div>
                                
                                <!-- Contenido del card -->
                                <div class="absolute inset-0 flex items-center justify-center p-6">
                                    <h3 class="text-white text-xl font-semibold drop-shadow-lg text-center relative accent-line">
                                        Reservas en línea
                                    </h3>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Card 2: Gestión de Pedidos -->
                        <a wire:navigate href="productos" class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 card-shadow-orders h-80">
                            <div class="relative w-full h-full overflow-hidden">
                                <img src="/images/platillos-de-restaurante.jpg" 
                                    alt="Platillos deliciosos" 
                                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                                
                                <div class="absolute inset-0 overlay-gradient opacity-80 group-hover:opacity-90 transition-opacity duration-400"></div>
                                
                                <div class="absolute inset-0 flex items-center justify-center p-6">
                                    <h3 class="text-white text-xl font-semibold drop-shadow-lg text-center relative accent-line">
                                        Platillos deliciosos
                                    </h3>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Card 3: Análisis de Datos -->
                        <a wire:navigate href="carrito" class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 card-shadow-analytics h-80">
                            <div class="relative w-full h-full overflow-hidden">
                                <img src="/images/delivery.jpg" 
                                    alt="Análisis de Datos" 
                                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                                
                                <div class="absolute inset-0 overlay-gradient opacity-80 group-hover:opacity-90 transition-opacity duration-400"></div>
                                
                                <div class="absolute inset-0 flex items-center justify-center p-6">
                                    <h3 class="text-white text-xl font-semibold drop-shadow-lg text-center relative accent-line">
                                        Envios a tu hogar
                                    </h3>
                                </div>
                            </div>
                        </a>
                        
                        <!-- Card 4: Experiencia del Cliente -->
                        {{-- <a href="#customer" class="group relative bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 card-shadow-customer h-80">
                            <div class="relative w-full h-full overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=400&h=400&fit=crop&crop=center" 
                                    alt="Experiencia del Cliente" 
                                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110">
                                
                                <div class="absolute inset-0 overlay-gradient opacity-80 group-hover:opacity-90 transition-opacity duration-400"></div>
                                
                                <div class="absolute inset-0 flex items-center justify-center p-6">
                                    <h3 class="text-white text-xl font-semibold drop-shadow-lg text-center relative accent-line">
                                        Experiencia del Cliente
                                    </h3>
                                </div>
                            </div>
                        </a> --}}
                        
                    </div>
                </div>
                    
                </div>
            </div>
        </section>
        <!---------------------- FIN SECTION BIENVENIDOS ------------------>

    
    <!---------------------- SECCION CATEGORIAS ------------------>
    {{-- <div class="bg-gradient-to-b from-black to-gray-800 py-20">
    <div class="max-w-xl mx-auto">
        <div class="text-center ">
        <div class="relative flex flex-col items-center mb-6">
            <h1 class="text-5xl text-white font-leckerli dark:text-gray-200">Nuestra <span class="text-digirest">Carta</span> </h1>
            
        </div>
        <p class="mb-12 text-base text-center text-gray-400">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus magni eius eaque?
            Pariatur
            numquam, odio quod nobis ipsum ex cupiditate?
        </p>
        </div>
    </div>

    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">

        <a class="categoria-link group flex flex-col bg-white border transition dark:bg-slate-900 dark:border-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
            <div class="p-4 md:p-5">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="/images/fondos1-categorias.png" alt="Image Description">
                <div class="ms-3">
                    <h3 class="group-hover:text-digirest font-semibold text-black dark:group-hover:text-gray-400 dark:text-gray-200">
                    Fondos
                    </h3>
                </div>
                </div>
                <div class="ps-3">
                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
                </div>
            </div>
            </div>
        </a>

        <a class="categoria-link group flex flex-col bg-white border transition dark:bg-slate-900 dark:border-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
            <div class="p-4 md:p-5">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="/images/bebidas5-categorias.png" alt="Image Description">
                <div class="ms-3">
                    <h3 class="group-hover:text-digirest font-semibold text-black dark:group-hover:text-gray-400 dark:text-gray-200">
                    Bebidas
                    </h3>
                </div>
                </div>
                <div class="ps-3">
                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
                </div>
            </div>
            </div>
        </a>

        <a class="categoria-link group flex flex-col bg-white border transition dark:bg-slate-900 dark:border-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
            <div class="p-4 md:p-5">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="/images/aperitivos2-cate.png" alt="Image Description">
                <div class="ms-3">
                    <h3 class="group-hover:text-digirest font-semibold text-black dark:group-hover:text-gray-400 dark:text-gray-200">
                    Aperitivos
                    </h3>
                </div>
                </div>
                <div class="ps-3">
                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
                </div>
            </div>
            </div>
        </a>

        <a class="categoria-link group flex flex-col bg-white border transition dark:bg-slate-900 dark:border-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
            <div class="p-4 md:p-5">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="/images/postres1-categorias.png" alt="Image Description">
                <div class="ms-3">
                    <h3 class="group-hover:text-digirest font-semibold text-black dark:group-hover:text-gray-400 dark:text-gray-200">
                    Postres
                    </h3>
                </div>
                </div>
                <div class="ps-3">
                <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
                </div>
            </div>
            </div>
        </a>

        </div>
    </div>

    </div> --}}
    <!---------------------- FIN CATEGORIAS ------------------>
    

    <!----------------------------COMENTARIOS------------------------------------->
    <div class="section-container-3 w-full">
    <section class="min-h-screen py-12">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-digirest rounded-full mb-6 animate-pulse-hover">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm3.5 6L12 10.5 8.5 8 12 5.5 15.5 8zM8.5 16L12 13.5 15.5 16 12 18.5 8.5 16z"/>
                    </svg>
                </div>
                <h1 class="text-4xl font-bold text-white mb-4">Reseñas de Nuestros</h1>
                <h2 class="text-3xl font-bold text-digirest">Comensales</h2>
                <div class="w-24 h-1 bg-digirest mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse-hover">
                    <div class="relative">
                        <div class="quote-mark text-digirest absolute -top-4 -left-2">"</div>
                        <p class="text-gray-700 text-lg leading-relaxed mb-6 relative z-10">
                            "La comida aquí se ha convertido en <span class="font-semibold text-digirest">una de mis opciones favoritas</span> para todas mis cenas especiales. Hablo de este lugar casi tanto como hablo de mi familia, y eso dice mucho. Gracias por la experiencia increíble."
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-digirest to-yellow-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            M
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-black">María González</h4>
                            <p class="text-gray-500 text-sm">Cliente Frecuente</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse-hover">
                    <div class="relative">
                        <div class="quote-mark text-digirest absolute -top-4 -left-2">"</div>
                        <p class="text-gray-700 text-lg leading-relaxed mb-6 relative z-10">
                            "Hace 6 meses, @chef_carlos me recomendó este restaurante. Estaba dudoso porque suelo ir a otros lugares. Acabo de pasar 2 horas aquí, y <span class="font-semibold text-digirest">WOW</span>. Definitivamente voy a recomendar este lugar en mi trabajo."
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-gray-600 to-gray-800 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            A
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-black">Andrés Ruiz</h4>
                            <p class="text-gray-500 text-sm">@andresruiz</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse-hover">
                    <div class="relative">
                        <div class="quote-mark text-digirest absolute -top-4 -left-2">"</div>
                        <p class="text-gray-700 text-lg leading-relaxed mb-6 relative z-10">
                            "Debo decir que este restaurante es <span class="font-semibold text-digirest">increíble y un placer</span> para cenar. @chef_master tú y tu equipo han hecho un trabajo excelente."
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            J
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-black">Javier Morales</h4>
                            <p class="text-gray-500 text-sm">Food Blogger</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 4 -->
                <div class="bg-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse-hover">
                    <div class="relative">
                        <div class="quote-mark text-digirest absolute -top-4 -left-2">"</div>
                        <p class="text-gray-700 text-lg leading-relaxed mb-6 relative z-10">
                            "He organizado algunas cenas familiares aquí y solo tengo que comentar lo <span class="font-semibold text-digirest">bien diseñado</span> que está el ambiente, y qué rápido se puede crear una experiencia memorable. Impresionante."
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            L
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-black">Laura Vega</h4>
                            <p class="text-gray-500 text-sm">Organizadora de Eventos</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 5 -->
                <div class="bg-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse-hover">
                    <div class="relative">
                        <div class="quote-mark text-digirest absolute -top-4 -left-2">"</div>
                        <p class="text-gray-700 text-lg leading-relaxed mb-6 relative z-10">
                            "¿Qué más se puede pedir? Este restaurante es genial. Esta será mi primera opción al crear planes gastronómicos para clientes desde hoy en adelante."
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-700 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            C
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-black">Carlos Mendoza</h4>
                            <p class="text-gray-500 text-sm">Consultor Gastronómico</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 6 -->
                <div class="bg-gray-200 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse-hover">
                    <div class="relative">
                        <div class="quote-mark text-digirest absolute -top-4 -left-2">"</div>
                        <p class="text-gray-700 text-lg leading-relaxed mb-6 relative z-10">
                            "Este restaurante es <span class="font-semibold text-digirest">una alegría para visitar</span>. Prácticamente cubre todos los casos de uso para una cena perfecta. Excelente trabajo."
                        </p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            S
                        </div>
                        <div class="ml-4">
                            <h4 class="font-semibold text-black">Sofía Torres</h4>
                            <p class="text-gray-500 text-sm">Crítica Gastronómica</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-------------------------------FIN COMENTARIOS---------------------------------->

    <!---------------------- Sección de Contacto y Ubicación ----------------------->
    <section id="contacto" class="py-16 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto max-w-7xl">

            <div class="text-center mb-12">
                <h2 class="text-4xl sm:text-5xl font-bold text-white mb-4">
                    Contáct<span class="text-[#FAC122]">anos</span>
                </h2>
                <div class="w-24 h-1 bg-digirest mx-auto mt-4 rounded-full"></div>
                <p class="mt-3 text-base text-center text-gray-300">
                    Gracias por visitar nuestro sitio web. Esperamos puedas visitarnos para vivir una experiencia inolvidable
                </p>
            </div>  
            <div class="flex flex-col md:flex-row gap-8 md:gap-12 items-stretch">
                
                <!-- Columna Izquierda - Mapa -->
                <div class="w-full md:w-1/2">
                    <div class="h-64 md:h-96 w-full rounded-lg overflow-hidden shadow-2xl border border-zinc-700">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31208.84167394065!2d-76.97531545!3d-12.0463731!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c6f19ee5b4c5%3A0x4c9e82b8c8b8b8b8!2sSanta%20Anita%2C%20Lima!5e0!3m2!1ses!2spe!4v1609459200000!5m2!1ses!2spe"
                            width="100%" 
                            height="100%" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full h-full">
                        </iframe>
                    </div>
                </div>

                <!-- Columna Derecha - Información de Contacto -->
                <div class="w-full md:w-1/2 flex flex-col justify-center space-y-8">
                    
                    <!-- Secciones Ubícanos y Contáctanos lado a lado -->
                    <div class="flex flex-col sm:flex-row gap-8">
                        
                        <!-- Sección Ubicanos -->
                        <div class="flex-1 space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-digirest rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <h2 class="text-xl md:text-2xl font-bold text-white tracking-wide">
                                    Ubícanos
                                </h2>
                            </div>
                            <div class="pl-11">
                                <p class="text-gray-300 text-base leading-relaxed">
                                    Av. Los Frutales 344<br>
                                    Santa Anita, Lima 43<br>
                                    Lima, Perú
                                </p>
                            </div>
                        </div>

                        <!-- Sección Contáctanos -->
                        <div class="flex-1 space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-digirest rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl md:text-2xl font-bold text-white tracking-wide">
                                    Contáctanos
                                </h3>
                            </div>
                            <div class="pl-11 space-y-3">
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-400 font-medium">Celular</p>
                                    <p class="text-white text-base font-semibold">+51 987 654 321</p>
                                </div>
                                <div class="space-y-1">
                                    <p class="text-sm text-gray-400 font-medium">Teléfono Fijo</p>
                                    <p class="text-white text-base font-semibold">(01) 345 6789</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Horarios de Atención -->
                    <div class="bg-transparent rounded-lg p-6 border border-zinc-700">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-6 h-6 bg-digirest rounded-full flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-white">Horarios de Atención</h4>
                        </div>
                        <div class="space-y-2 text-gray-300">
                            <div class="flex justify-between">
                                <span class="font-medium">Lun - Vie:</span>
                                <span>9:00 AM - 10:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium">Sábados:</span>
                                <span>10:00 AM - 11:00 PM</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="font-medium">Domingos:</span>
                                <span>11:00 AM - 9:00 PM</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------------------- FIN Sección de Contacto y Ubicación ----------------------->
</div>
</div>
