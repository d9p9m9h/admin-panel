<?php

use App\Http\Controllers\MyPortfolioController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','/admin');

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'create'])
    ->name('login');

    Route::post('/login', [LoginController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('login.store');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

    Route::get('/portfolios/{portfolio}', [PortfolioController::class, 'show'])
    ->name('portfolios.show');

    Route::get('/my-portfolio', [MyPortfolioController::class, 'show'])
    ->name('my-portfolio');
    
    Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');
    
});
