
<?php

use Illuminate\Support\Facades\Route;

// Controladores Cliente
use App\Http\Controllers\Client\CatalogController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\OrderController as ClientOrderController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Client\ReceiptController;

// Controladores Administrador
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ExtraController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DeliverymanController;
use App\Http\Controllers\AuthController;


// Página principal
Route::get('/', function () {
    return view('landing');
})->name('home');
// Rutas de autenticación
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Rutas Cliente
Route::middleware('auth')->group(function () {
    // Catálogo y productos
    Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog');
    Route::get('/products/{id}', [CatalogController::class, 'show'])->name('product.detail');

    // Carrito
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Pedidos
    Route::get('/checkout', [ClientOrderController::class, 'checkout'])->name('checkout');
    Route::get('/orders', [ClientOrderController::class, 'index'])->name('orders');
    Route::get('/orders/{id}', [ClientOrderController::class, 'show'])->name('orders.detail');
    Route::post('/orders/{id}/cancel', [ClientOrderController::class, 'cancel'])->name('orders.cancel');
        // Confirmar pedido (checkout)
        Route::match(['get', 'post'], '/checkout', [ClientOrderController::class, 'checkout'])->name('checkout');


    // Recibos
    Route::get('/receipts', [ReceiptController::class, 'index'])->name('receipts');
    Route::get('/receipts/{orderId}', [ReceiptController::class, 'download'])->name('receipts.download');

    // Perfil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Rutas Administrador
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // CRUDs principales
    Route::resource('products', ProductController::class)->names('products');
    Route::resource('categories', CategoryController::class)->names('categories');
    Route::resource('users', UserController::class)->names('users');
    Route::resource('extras', ExtraController::class)->names('extras');
    Route::resource('coupons', CouponController::class)->names('coupons');
    Route::resource('deliverymen', DeliverymanController::class)->names('deliverymen');

    // Pedidos
    Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'destroy'])->names('orders');
    Route::post('orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.status');
});
