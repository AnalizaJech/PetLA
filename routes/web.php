<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PreCitaAdminController;
use App\Http\Controllers\Public\PreCitaPublicaController;

/*

// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [PreCitaPublicaController::class, 'show'])->name('pre_cita.show');
Route::post('/', [PreCitaPublicaController::class, 'store'])->name('pre_cita.store');

*/

Route::get('/', function () {
    return view('welcome');
})->name('pre_cita.show');


// Ruta de dashboard: redirige según el rol usando middleware
Route::get('/dashboard', fn () => null) // ← evita el error de vista no encontrada
    ->middleware(['auth', 'verified', 'rol.redirect'])
    ->name('dashboard');

// Rutas protegidas para editar perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Paneles específicos por rol
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard');
    Route::view('/veterinario/dashboard', 'veterinario.dashboard');
    Route::view('/cliente/dashboard', 'cliente.dashboard');
});

// Autenticación Breeze
require __DIR__.'/auth.php';



Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('pre-citas', [PreCitaAdminController::class, 'index'])->name('pre_citas.index');
        Route::post('pre-citas/{preCita}/rechazar', [PreCitaAdminController::class, 'rechazar'])->name('pre_citas.rechazar');
        Route::post('pre-citas/{preCita}/convertir', [PreCitaAdminController::class, 'convertir'])->name('pre_citas.convertir');
    });
});

