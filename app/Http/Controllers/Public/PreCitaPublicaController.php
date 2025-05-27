<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PreCita;
use Illuminate\Http\Request;

class PreCitaPublicaController extends Controller
{
    public function show()
    {
        return view('public.pre_cita');
//return 'La vista fue llamada';

    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'email' => 'required|email',
            'fecha_solicitada' => 'required|date|after:now',
        ]);

        PreCita::create([
            'nombre_cliente' => $request->nombre_cliente,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'fecha_solicitada' => $request->fecha_solicitada,
            'estado' => 'pendiente',
        ]);

        return redirect()->back()->with('status', '¡Tu solicitud fue enviada correctamente!');
    }
}
