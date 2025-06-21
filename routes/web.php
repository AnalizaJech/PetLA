<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PreCitaAdminController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\PreCitaController;
use App\Http\Controllers\Public\PreCitaPublicaController;
use Illuminate\Support\Facades\Mail;

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
//Route::get('/dashboard', fn () => null) // ← evita el error de vista no encontrada
//    ->middleware(['auth', 'verified', 'rol.redirect'])
//    ->name('dashboard');

// Rutas protegidas para editar perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Paneles específicos por rol
//Route::middleware(['auth', 'verified'])->group(function () {
//    Route::view('/admin/dashboard', 'admin.dashboard');
//    Route::view('/veterinario/dashboard', 'veterinario.dashboard');
//    Route::view('/cadmin/dashboard', 'cliente.dashboard');
//});






// Autenticación Breeze
require __DIR__.'/auth.php';





Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/citas', [PreCitaAdminController::class, 'index'])->name('citas');
    Route::post('/citas/{preCita}/rechazar', [PreCitaAdminController::class, 'rechazar'])->name('citas.rechazar');
    Route::post('/citas/{preCita}/convertir', [PreCitaAdminController::class, 'convertir'])->name('citas.convertir');
});



// -----------------------------------------
// Rutas dinamicas para el navbar del admin 
// -----------------------------------------

$pages_admin = [
    "dashboard" => "admin_panel.dashboard.index",
    "duenos" => "admin_panel.duenos.index",
    "veterinarios" => "admin_panel.veterinarios.index",
    "mascotas" => "admin_panel.mascotas.index",
    "historial_clinico" => "admin_panel.historial_clinico.index"
];

Route::middleware(["auth","verified"]) -> group(function () use ($pages_admin){
    foreach($pages_admin as $uri => $view){
        Route::view("/{$uri}",$view)-> name($uri);
    }
});

// ------------------------
// ROUTES FOR MASCOTAS
// ------------------------
Route::resource('mascotas', MascotasController::class);
// ------------------------
// ROUTES FOR PRE CITAS
// ------------------------
Route::resource('precitas', PreCitaController::class);
// ------------------------
// ROUTES FOR CITAS
// ------------------------
Route::resource('citas', CitaController::class);

// ------------------------
// ROUTES FOR DASHBOARD
// ------------------------
Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard.index");