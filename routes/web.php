<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MercadopagoController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']
);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'admin','verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('posts', PostController::class);

    Route::resource('products', ProductController::class);

    Route::resource('categories', CategoryController::class);

    Route::post('/agregaritem', [CartController::class, 'agregaritem'])->name('agregaritem');
    
    Route::get('/carrito', [CartController::class, 'mostrarCarrito'])->name('carrito');

    Route::get('/incrementar/{id}', [CartController::class, 'incrementarqty'])->name('incrementar');

    Route::get('/decrementar/{id}', [CartController::class, 'decrementarqty'])->name('decrementar');

    Route::get('eliminar/{id}', [CartController::class, 'eliminarItem'])->name('eliminar');

    Route::get('eliminar', [CartController::class, 'eliminarCarrito'])->name('eliminarCarrito');

    Route::get('/comprar', [CartController::class, 'comprar'])->name('comprar');

    Route::post('paypal-payment',[PaypalController::class, 'payWithPayPal'])->name('pago-paypal');

    Route::get('paypal-status',[PaypalController::class, 'getPaymentStatus'])->name( 'paypal-status');

    Route::get('mercadopago-payment', [MercadopagoController::class, 'payWithMercadoPago'])->name('pago-mercadopago');

    Route::get('mercadopago-status',[MercadopagoController::class, 'getPaymentStatus'])->name( 'mercadopago-status');

    Route::get('prueba-comprar', function()
    {
        return view('comprar');
    });


    Route::post('post/{post}/comments', [CommentController::class, 'store'])->name('comments.store');

    // Route::get('post/{post}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');

    // Route::put('post/{post}/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

    // Route::delete('post/{post}/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('product/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('/checkout', function () {
    return view('pagos.paypal');
    })->name('checkout');
    
});

require __DIR__.'/auth.php';
