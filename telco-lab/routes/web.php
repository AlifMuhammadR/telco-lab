<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUser;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\ProductController;
use Symfony\Component\Routing\Router;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/dashboard-admin', DashboardAdminController::class)->name('index', 'dashboard-admin');
Route::resource('/dashboard-user', DashboardUser::class)->name('index', 'dashboard-user');
Route::resource('/resellers', ResellerController::class)->name('index', 'resellers');
Route::resource('/products', ProductController::class)->name('index', 'products');
