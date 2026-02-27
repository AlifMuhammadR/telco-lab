<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Login routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard routes (sesuai role)
Route::resource('/dashboard-admin', DashboardAdminController::class)
    ->middleware(['auth', 'role:admin'])
    ->names(['index' => 'dashboard-admin']);

Route::resource('/dashboard-user', DashboardUser::class)
    ->middleware(['auth', 'role:user'])
    ->names(['index' => 'dashboard-user']);

// Vendor routes (hanya admin)
Route::resource('vendors', VendorController::class)
    ->middleware(['auth', 'role:admin']);

// Reseller routes untuk user biasa
Route::middleware(['auth'])->group(function () {
    Route::get('/resellers', [ResellerController::class, 'index'])->name('resellers.index');
    Route::get('/resellers/{id}', [ResellerController::class, 'show'])->name('resellers.show');
});

// Reseller routes untuk admin (dengan prefix 'admin')
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/resellers', [ResellerController::class, 'indexAdmin'])->name('resellers.index');
    Route::post('/resellers', [ResellerController::class, 'store'])->name('resellers.store');
    Route::get('/resellers/{id}/edit', [ResellerController::class, 'edit'])->name('resellers.edit');
    Route::put('/resellers/{id}', [ResellerController::class, 'update'])->name('resellers.update');
    Route::delete('/resellers/{id}', [ResellerController::class, 'destroy'])->name('resellers.destroy');
    Route::get('/resellers/{id}', [ResellerController::class, 'showAdmin'])->name('resellers.show');
});

// Product dan Contact routes (semua user login bisa akses)
Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
});

// Admin routes untuk products
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/products', [ProductController::class, 'indexAdmin'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // opsional
    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{id}', [ProductController::class, 'showAdmin'])->name('products.show');
});

// Contact routes untuk user biasa
Route::middleware(['auth'])->group(function () {
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
});

// Admin routes untuk contacts
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/contacts', [ContactController::class, 'indexAdmin'])->name('contacts.index');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::get('/contacts/{id}', [ContactController::class, 'showAdmin'])->name('contacts.show');
});
