<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PreCita;
use App\Models\User;
use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PreCitaConvertida;
use App\Notifications\PreCitaRechazada;
use Carbon\Carbon;

class PreCitaAdminController extends Controller
{
    public function index()
    {
        $preCitas = PreCita::where('estado', 'pendiente')->get();
        return view('admin.pre_citas.index', compact('preCitas'));
    }

    public function rechazar(PreCita $preCita)
    {
        $preCita->update(['estado' => 'rechazada']);
        Notification::route('mail', $preCita->email)->notify(new PreCitaRechazada($preCita));
        return redirect()->back()->with('status', 'Pre-cita rechazada.');
    }

    public function convertir(PreCita $preCita)
    {
        $veterinario = User::where('role', 'veterinario')->inRandomOrder()->first();

        if (!$veterinario) {
            return back()->with('error', 'No hay veterinarios disponibles.');
        }

        $inicio = Carbon::parse($preCita->fecha_solicitada);
        $fin = $inicio->copy()->addMinutes(30);

        Cita::create([
            'mascota_id' => 1, // ⚠️ Temporal (sin mascota real aún)
            'veterinario_id' => $veterinario->id,
            'inicio' => $inicio,
            'fin' => $fin,
            'estado' => 'pendiente_pago',
        ]);

        $preCita->update(['estado' => 'convertida']);

        Notification::route('mail', $preCita->email)->notify(new PreCitaConvertida($preCita));

        return back()->with('status', 'Pre-cita convertida en cita.');
    }
}
