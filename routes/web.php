<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\Admin\UserController;
// use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\Auth\ResetPasswordController;
// use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\CustomerController;
// use App\Http\Controllers\SupplierController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\RecordController;
// use App\Http\Controllers\InventoryController;
// use App\Http\Controllers\ReceiptController;
// use App\Http\Controllers\RecordDetailController;
// use App\Http\Controllers\WelcomeController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\VentasController;

// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// */

// // Landing page y rutas abiertas para cualquier usuario
// Route::get('/', [WelcomeController::class, 'welcome'])->name('landing');

// Auth::routes();

// // Rutas de autenticación
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [LoginController::class, 'login']);
// Route::post('logout', [LoginController::class, 'logout'])->name('logout');
// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [RegisterController::class, 'register']);

// // Rutas para recuperar contraseña
// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// // Ruta para el perfil de usuario accesible para todos los roles autenticados
// Route::middleware(['auth'])->group(function () {
//     Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
// });

// /*
// |--------------------------------------------------------------------------
// | Rutas protegidas por rol
// |--------------------------------------------------------------------------
// */

// // Rutas para el cliente: acceso limitado a vistas relacionadas con cliente
// Route::middleware(['role:cliente'])->group(function () {
//     Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customers.dashboard');
//     Route::get('/home', [HomeController::class, 'index'])->name('home');
//     Route::get('/records', [HomeController::class, 'clientDashboard'])->name('client.dashboard');
//     Route::resource('products', ProductController::class)->only(['index', 'show']);
// });

// // Rutas para el administrador: acceso completo a todas las vistas y funcionalidades
// Route::middleware(['role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::resource('users', UserController::class);
//     Route::resource('products', ProductController::class);
//     Route::resource('categories', CategoryController::class);
//     Route::resource('customers', CustomerController::class);
//     Route::resource('suppliers', SupplierController::class);
//     Route::resource('inventories', InventoryController::class);
//     Route::resource('records', RecordController::class);
//     Route::resource('receipts', ReceiptController::class);
//     Route::resource('record_details', RecordDetailController::class);
// });

// // Rutas para el encargado de ventas: acceso limitado a las vistas de ventas y proveedores
// Route::middleware(['role:ventas'])->group(function () {
//     Route::get('customers/dashboard', [VentasController::class, 'dashboard'])->name('customer.dashboard');
//     Route::resource('records', RecordController::class);
//     Route::resource('receipts', ReceiptController::class);
//     Route::resource('products', ProductController::class)->only(['index', 'show']);
//     Route::resource('suppliers', SupplierController::class)->except(['destroy']);
// });


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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VentasController;

/*--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------*/

// Landing page y rutas abiertas para cualquier usuario
Route::get('/', [WelcomeController::class, 'welcome'])->name('landing');

Auth::routes();

// Rutas de autenticación
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Rutas para recuperar contraseña
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Ruta para el perfil de usuario accesible para todos los roles autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
});

/*--------------------------------------------------------------------------
| Rutas protegidas por rol
|--------------------------------------------------------------------------*/

// Rutas para el cliente: acceso limitado a vistas relacionadas con cliente
Route::middleware(['role:cliente'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customers.dashboard');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/records', [HomeController::class, 'clientDashboard'])->name('client.dashboard');
    Route::resource('products', ProductController::class)->only(['index', 'show']);
});

// Rutas para el administrador: acceso completo a todas las vistas y funcionalidades
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('inventories', InventoryController::class);
    Route::resource('records', RecordController::class);
    Route::resource('receipts', ReceiptController::class);
    Route::resource('record_details', RecordDetailController::class);
});

// Rutas para el encargado de ventas: acceso limitado a las vistas de ventas y proveedores
Route::middleware(['role:ventas'])->group(function () {
    Route::get('/records/dashboard', [VentasController::class, 'dashboard'])->name('records.dashboard');
    Route::resource('records', RecordController::class);
    Route::resource('receipts', ReceiptController::class);
    Route::resource('products', ProductController::class)->only(['index', 'show']);
    Route::resource('suppliers', SupplierController::class)->except(['destroy']);
});
