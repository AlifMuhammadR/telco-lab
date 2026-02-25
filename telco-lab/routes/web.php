<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardAdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard-admin', [DashboardAdminController::class, 'index']);
