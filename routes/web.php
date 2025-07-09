<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\HomePage;
use App\Livewire\CategoriesPage;
use App\Livewire\ProductsPage;
use App\Livewire\CartPage;

use App\Livewire\CheckoutPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\OrderDetailPage;

use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\ResetPasswordPage;

use App\Livewire\SuccessPage;
use App\Livewire\CancelPage;
use App\Livewire\ReservationsPage;
use App\Livewire\PaymentCardPage;

use Illuminate\Support\Facades\Auth;

Route::get('/', HomePage::class);

Route::get('/categorias', CategoriesPage::class);
Route::get('/productos', ProductsPage::class);
/* Route::get('/reservas', ReservationsPage::class); */
Route::get('/carrito', CartPage::class);
Route::get('/productos/{slug}', ProductDetailPage::class);


Route::middleware('guest')->group(function(){
    Route::get('/iniciar-sesion', LoginPage::class)->name('login');
    Route::get('/registrar', RegisterPage::class);
    Route::get('/contraseña-olvidada', ForgotPasswordPage::class)->name('password.request');
    Route::get('/restaurar-contraseña', ResetPasswordPage::class);
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', function(){ 
        Auth::logout();
        return redirect('/');
    });
    Route::get('/reservas', ReservationsPage::class)->name('reservations');
    Route::get('/verificar', CheckoutPage::class);
    Route::get('/mis-pedidos', MyOrdersPage::class);
    Route::get('/mis-pedidos/{order_id}', OrderDetailPage::class)->name('my-orders.show');

    Route::get('/exitoso', SuccessPage::class)->name('success');
    Route::get('/cancelado', CancelPage::class)->name('cancel');
    
    Route::get('/pago-tarjeta', PaymentCardPage::class)->name('pago.tarjeta');
});

