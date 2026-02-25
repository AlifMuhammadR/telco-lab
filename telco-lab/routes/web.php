<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardUser;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard-admin', [DashboardAdminController::class, 'index']);
Route::get('/dashboard-user', [DashboardUser::class, 'index']);
