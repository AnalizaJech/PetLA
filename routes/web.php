<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PreCitaAdminController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MascotasController;
use App\Http\Controllers\PreCitaController;
use App\Http\Controllers\Public\PreCitaPublicaController;
use App\Http\Controllers\UserController;
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
});


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






// Autenticación Breeze
require __DIR__.'/auth.php';



// ------------------------------
// Rutas protegidas del Admin
// ------------------------------
Route::middleware(['auth', 'verified','adminMiddelware'])->group(function () {
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
    
    // ------------------------
    // ROUTES FOR VETERINARIOS
    // ------------------------
    Route::get('/veterinarios', [UserController::class, 'indexVeterinario'])->name("veterinarios.index");
    

    // -----------------------------
    // ROUTES FOR DUEÑOS O CLIENTES
    // ---------------------------
    Route::get('/duenos', [UserController::class, 'indexDueno'])->name("duenos.index");
    Route::delete("/duenos/{id}", [UserController::class, "destroy"])->name("duenos.destroy");

});


// ------------------------------
// Rutas protegidas del Cliente
// ------------------------------

Route::middleware(['auth', 'verified','clienteMiddelware'])->group(function () {

    // ------------------------
    // DASHBOARD
    // ------------------------
    Route::get('cliente/dashboard', [DashboardController::class, 'index'])->name("cliente_dashboard.index");
    // ------------------------
    // MIS MASCOTAS
    // ------------------------
    Route::get("cliente/mascotas", [MascotasController::class,"index"])->name("cliente_mascotas.index");
});


// ----------------------------------
// Rutas protegidas del Veterinario
// ----------------------------------

Route::middleware(['auth', 'verified','veterinarioMiddelware'])->group(function () {
    
    // ------------------------
    // DASHBOARD
    // ------------------------
    Route::get('veterinario/dashboard', [DashboardController::class, 'index'])->name("veterinario_dashboard.index"); 

});
