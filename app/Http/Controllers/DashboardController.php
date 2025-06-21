<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Mascotas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMascotas = Mascotas::count();
        $totalClientes= User::where('role', 'cliente')->count();
        $totalCitas= Cita::count();
        $citasPendientes= Cita::where('estado', 'pendiente')->count();

        // citas por mes
        $citasMes= Cita::selectRaw("DATE_FORMAT(fecha_hora, '%Y-%m') as mes, COUNT(*) as total")
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $labels = $citasMes->pluck('mes');
        $data = $citasMes->pluck('total');

        //citas hoy 
        $citasHoy = Cita::with("mascota","veterinario")
            ->whereDate('fecha_hora', Carbon::today())
            ->latest()
            ->take(4)
            ->get();

        return view('admin_panel.dashboard.index', compact("totalMascotas","totalCitas","citasPendientes","totalClientes","labels","data","citasHoy"));
    }
}
