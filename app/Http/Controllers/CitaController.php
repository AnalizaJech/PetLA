<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Mascotas;
use App\Models\User;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with('veterinario')->orderBy('id', 'desc')->paginate(5);
        $mascotas = Mascotas::all();
        return view('admin_panel.citas.index', compact('citas', 'mascotas')); 
    }

    public function destroy($id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada correctamente.');
    }

    public function create()
    {
        $veterinarios= User::where('role', 'veterinario')->get();
        $mascotas = Mascotas::all();
        return view('admin_panel.citas.create', compact('veterinarios', 'mascotas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required',
            'veterinario_id' => 'required',
            'fecha_hora' => 'required|date',
            'motivo' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,confirmado,cancelado',
        ]);

        Cita::create($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita creada correctamente.');
    }

    public function edit(string $id)
    {
        $cita = Cita::findOrFail($id);
        $veterinarios = User::where('role', 'veterinario')->get();
        $mascotas = Mascotas::all();
        return view('admin_panel.citas.edit', compact('cita', 'veterinarios', 'mascotas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'mascota_id' => 'required',
            'veterinario_id' => 'required',
            'fecha_hora' => 'required|date',
            'motivo' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,confirmado,cancelado',
        ]);

        $cita = Cita::findOrFail($id);
        $cita->update($request->all());
        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }


}
