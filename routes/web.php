<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/admin');
Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');