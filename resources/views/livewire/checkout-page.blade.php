<div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8 px-4 sm:px-6 lg:px-8">
	<div class="max-w-7xl mx-auto">
		<!-- Header -->
		<div class="text-center mb-8">
			<h1 class="text-4xl font-bold text-gray-800 mb-2">Verificación de Compra</h1>
			<p class="text-gray-600">Completa tu información para finalizar el pedido</p>
		</div>

		<form wire:submit.prevent='placeOrder' id="checkout-form">
			<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
				<!-- Formulario Principal -->
				<div class="lg:col-span-8">
					<div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 sm:p-8">
						<!-- Dirección de Envío -->
						<div class="mb-8">
							<div class="flex items-center space-x-3 mb-6">
								<div class="w-8 h-8 bg-digirest rounded-full flex items-center justify-center">
									<svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
									</svg>
								</div>
								<h2 class="text-2xl font-bold text-gray-800">Dirección de Envío</h2>
							</div>

							<!-- Nombres y Apellidos -->
							<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
								<div>
									<label class="block text-sm font-semibold text-gray-700 mb-2" for="first_name">
										Nombres
									</label>
									<input wire:model="first_name" 
										class="w-full rounded-xl border-2 border-gray-200 py-3 px-4 text-gray-700 focus:border-digirest focus:outline-none focus:ring-2 focus:ring-digirest/20 transition-all duration-200 @error('first_name') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror" 
										id="first_name" 
										type="text"
										placeholder="Ingresa tus nombres">
									@error('first_name')
										<div class="text-red-500 text-sm mt-1 flex items-center">
											<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
												<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
											</svg>
											{{ $message }}
										</div>
									@enderror
								</div>
								<div>
									<label class="block text-sm font-semibold text-gray-700 mb-2" for="last_name">
										Apellidos
									</label>
									<input wire:model="last_name" 
										class="w-full rounded-xl border-2 border-gray-200 py-3 px-4 text-gray-700 focus:border-digirest focus:outline-none focus:ring-2 focus:ring-digirest/20 transition-all duration-200 @error('last_name') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror" 
										id="last_name" 
										type="text"
										placeholder="Ingresa tus apellidos">
									@error('last_name')
										<div class="text-red-500 text-sm mt-1 flex items-center">
											<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
												<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
											</svg>
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>

							<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
								<!-- Teléfono -->
								<div>
									<label class="block text-sm font-semibold text-gray-700 mb-2" for="phone">
										Teléfono o Celular
									</label>
									<input wire:model="phone" 
										class="w-full rounded-xl border-2 border-gray-200 py-3 px-4 text-gray-700 focus:border-digirest focus:outline-none focus:ring-2 focus:ring-digirest/20 transition-all duration-200 @error('phone') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror" 
										id="phone" 
										type="text"
										placeholder="Ej: 987654321">
									@error('phone')
										<div class="text-red-500 text-sm mt-1 flex items-center">
											<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
												<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
											</svg>
											{{ $message }}
										</div>
									@enderror
								</div>
								<!-- Distrito -->
								<div>
									<label class="block text-sm font-semibold text-gray-700 mb-2" for="district">
										Distrito
									</label>
									<input wire:model="district" 
										class="w-full rounded-xl border-2 border-gray-200 py-3 px-4 text-gray-700 focus:border-digirest focus:outline-none focus:ring-2 focus:ring-digirest/20 transition-all duration-200 @error('district') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror" 
										id="district" 
										type="text"
										placeholder="Ej: San Isidro"/>
									@error('district')
										<div class="text-red-500 text-sm mt-1 flex items-center">
											<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
												<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
											</svg>
											{{ $message }}
										</div>
									@enderror
								</div>
							</div>

							<!-- Dirección -->
							<div class="mb-6">
								<label class="block text-sm font-semibold text-gray-700 mb-2" for="street_address">
									Dirección Completa
								</label>
								<input wire:model="street_address" 
									class="w-full rounded-xl border-2 border-gray-200 py-3 px-4 text-gray-700 focus:border-digirest focus:outline-none focus:ring-2 focus:ring-digirest/20 transition-all duration-200 @error('street_address') border-red-500 focus:border-red-500 focus:ring-red-500/20 @enderror" 
									id="street_address" 
									type="text"
									placeholder="Av. Ejemplo 123, Urb. Los Olivos"/>
								@error('street_address')
									<div class="text-red-500 text-sm mt-1 flex items-center">
										<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
											<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
										</svg>
										{{ $message }}
									</div>
								@enderror
							</div>

							<!-- Referencia -->
							<div>
								<label class="block text-sm font-semibold text-gray-700 mb-2" for="reference">
									Referencia
								</label>
								<input wire:model="reference" 
									class="w-full rounded-xl border-2 border-gray-200 py-3 px-4 text-gray-700 focus:border-digirest focus:outline-none focus:ring-2 focus:ring-digirest/20 transition-all duration-200" 
									id="reference" 
									type="text"
									placeholder="Ej: Frente al parque principal"/>
							</div>
						</div>

						<!-- Método de Pago -->
						<div>
							<div class="flex items-center space-x-3 mb-6">
								<div class="w-8 h-8 bg-digirest rounded-full flex items-center justify-center">
									<svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
									</svg>
								</div>
								<h2 class="text-2xl font-bold text-gray-800">Método de Pago</h2>
							</div>

							<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
								<div>
									<input wire:model='payment_method' class="hidden peer" id="hosting-small" required="" type="radio" value="tarjeta" />
									<label class="flex items-center justify-between w-full p-6 text-gray-700 bg-white border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 peer-checked:border-digirest peer-checked:bg-digirest/5 peer-checked:text-digirest transition-all duration-200" 
										for="hosting-small">
										<div class="flex items-center space-x-4">
											<div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center">
												<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
												</svg>
											</div>
											<div>
												<div class="text-lg font-bold">Pago con Tarjeta</div>
												<div class="text-sm text-gray-500">Crédito, Débito.</div>
											</div>
										</div>
										<div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-digirest peer-checked:bg-digirest flex items-center justify-center">
											<div class="w-2 h-2 bg-white rounded-full opacity-0 peer-checked:opacity-100"></div>
										</div>
									</label>
								</div>
								<div>
									<input wire:model='payment_method' class="hidden peer" id="hosting-big" type="radio" value="efectivo">
									<label class="flex items-center justify-between w-full p-6 text-gray-700 bg-white border-2 border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 peer-checked:border-digirest peer-checked:bg-digirest/5 peer-checked:text-digirest transition-all duration-200" 
										for="hosting-big">
										<div class="flex items-center space-x-4">
											<div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg flex items-center justify-center">
												<svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
												</svg>
											</div>
											<div>
												<div class="text-lg font-bold">Pago en Efectivo</div>
												<div class="text-sm text-gray-500">Pago contra entrega</div>
											</div>
										</div>
										<div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-digirest peer-checked:bg-digirest flex items-center justify-center">
											<div class="w-2 h-2 bg-white rounded-full opacity-0 peer-checked:opacity-100"></div>
										</div>
									</label>
								</div>
							</div>
							@error('payment_method')
								<div class="text-red-500 text-sm mt-1 flex items-center">
									<svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
										<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
									</svg>
									{{ $message }}
								</div>
							@enderror
						</div>
					</div>
				</div>

				<!-- Sidebar -->
				<div class="lg:col-span-4">
					<div class="space-y-6">
						<!-- Resumen del Carrito -->
						<div class="bg-white rounded-2xl shadow-lg border border-gray-200 p-6 sticky top-8">
							<div class="flex items-center space-x-3 mb-6">
								<div class="w-8 h-8 bg-digirest rounded-full flex items-center justify-center">
									<svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l2.5 5m0 0L15 18m-6 0h6"></path>
									</svg>
								</div>
								<h2 class="text-xl font-bold text-gray-800">Resumen del Carrito</h2>
							</div>
							
							<div class="space-y-4 mb-6">
								@foreach ($cart_items as $ci)
								<div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-xl" wire:key='{{ $ci['product_id'] }}'>
									<div class="flex-shrink-0 w-12 h-12 bg-white rounded-lg overflow-hidden shadow-sm">
										<img alt="{{ $ci['name'] }}" class="w-full h-full object-cover" src="{{ url('storage', $ci['image']) }}">
									</div>
									<div class="flex-1 min-w-0">
										<p class="text-sm font-semibold text-gray-900 truncate">{{ $ci['name'] }}</p>
										<p class="text-sm text-gray-500">{{ $ci['quantity'] }} unidades</p>
									</div>
									<div class="text-sm font-bold text-digirest">
										S/ {{ Number::format($ci['total_amount'], 2) }}
									</div>
								</div>
								@endforeach
							</div>

							<!-- Resumen del Pedido -->
							<div class="border-t border-gray-200 pt-6">
								<div class="space-y-3 mb-6">
									<div class="flex justify-between items-center">
										<span class="text-gray-600">Subtotal</span>
										<span class="font-semibold text-gray-900">S/ {{ Number::format($grand_total, 2) }}</span>
									</div>
									<div class="flex justify-between items-center">
										<span class="text-gray-600">Delivery</span>
										<span class="font-semibold text-green-600">Gratis</span>
									</div>
									<div class="border-t border-gray-200 pt-3">
										<div class="flex justify-between items-center">
											<span class="text-lg font-bold text-gray-900">Total</span>
											<span class="text-2xl font-bold text-digirest">S/ {{ Number::format($grand_total, 2) }}</span>
										</div>
									</div>
								</div>

								<button type="submit" class="btn-click group relative w-full bg-digirest hover:bg-digirestDark text-black font-bold py-4 px-6 rounded-xl transition-all duration-200 ease-in-out transform hover:scale-105 active:scale-95 focus:outline-none focus:ring-2 focus:ring-digirest focus:ring-opacity-50 shadow-lg hover:shadow-xl">
									<span wire:loading.remove class="flex items-center justify-center space-x-2">
										<span>Confirmar Pedido</span>
										<svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
											<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
										</svg>
									</span>
									<span wire:loading class="flex justify-center items-center space-x-2">
										<svg class="h-5 w-5 text-black animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
											<circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
											<path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
										</svg>
									</span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>