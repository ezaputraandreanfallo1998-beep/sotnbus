<?php

use Illuminate\Support\Facades\Route;
use App\Models\BusRoute;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TiketController;

// Halaman utama
Route::get('/', function () {
    $featuredRoutes = BusRoute::with(['origin', 'destination', 'bus'])
                        ->where('is_featured', true)
                        ->get();

    return view('home', compact('featuredRoutes'));
})->name('home');

// Halaman detail bus route
Route::get('/bus-routes/{id}', function ($id) {
    $route = BusRoute::with(['origin', 'destination', 'bus'])->findOrFail($id);
    return view('bus-routes.show', compact('route'));
})->name('bus-routes.show');

// Halaman dashboard (wajib login)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('authenticated')
    ->name('dashboard');

// Proses pemesanan tiket (wajib login)
Route::post('/pesan-tiket', [OrderController::class, 'store'])
    ->middleware('authenticated')
    ->name('pesan.tiket');

// Halaman hasil pencarian tiket
Route::get('/tiket', [TiketController::class, 'show'])->name('tiket.show');

// Tambahan login & register (jika pakai Laravel Breeze/Fortify)
require __DIR__.'/auth.php';
