<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RecordDetailController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing page y rutas abiertas para cualquier usuario
Route::get('/', [WelcomeController::class, 'welcome'])->name('landing');
Auth::routes();

// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout'); // Asegúrate de tener esta ruta
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
// Rutas para recuperar contrase;a
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Ruta para el perfil de usuario accesible para todos los roles autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas por rol
|--------------------------------------------------------------------------
*/

// Rutas para el administrador: acceso completo a todas las vistas y funcionalidades
// Rutas para clientes: acceso únicamente a su perfil y vistas no relacionadas con administración
Route::middleware(['role:cliente'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/records', [HomeController::class, 'clientDashboard'])->name('client.dashboard');
    // El cliente solo puede ver los productos (comprar)
    Route::resource('products', ProductController::class)->only(['index', 'show']);
});

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

    // Administración de usuarios
    Route::resource('users', UserController::class);

    // Gestión de productos, categorías, clientes, proveedores, inventarios, y registros
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('inventories', InventoryController::class);
    Route::resource('records', RecordController::class);
    Route::resource('receipts', ReceiptController::class);
    Route::resource('record_details', RecordDetailController::class);
});

// Rutas para el encargado de ventas: acceso limitado a las vistas de ventas, proveedores (sin eliminar), recibos y perfil
Route::middleware(['role:ventas'])->group(function () {
    Route::get('/ventas', [HomeController::class, 'ventasDashboard'])->name('ventas.dashboard');

    // Acceso completo a ventas y recibos
    Route::resource('records', RecordController::class);
    Route::resource('receipts', ReceiptController::class);

    // Acceso limitado a productos y proveedores (sin poder eliminar)
    Route::resource('products', ProductController::class)->only(['index', 'show']);
    Route::resource('suppliers', SupplierController::class)->except(['destroy']);
});

