<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\User;
use Illuminate\Http\Request;

class MascotasController extends Controller
{
    
    public function index()
    {
        $mascotas = Mascotas::with('usuario')->get();
        $users = User::all();
        return view('admin_panel.mascotas.index', compact('mascotas', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string',
            'raza' => 'nullable|string',
            'fecha_nacimiento' => 'required|nullable|date',
            'foto_blob' => 'nullable'
        ]);

        Mascotas::create($request->all());
        return redirect()->route('mascotas.index')->with('success', 'Mascota registrada correctamente.');
    }

    
    
    
    public function edit(string $id)
    {
        $mascota = Mascotas::findOrFail($id);
        $users = User::all(); 
        return view('admin_panel.mascotas.edit', compact("mascota","users"));
    }

    
    public function update(Request $request, string $id)
    {
        $request->validate([
            'user_id' => 'required',
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string',
            'raza' => 'nullable|string',
            'fecha_nacimiento' => 'required|nullable|date',
            'foto_blob' => 'nullable'
        ]);

        $mascota = Mascotas::findOrFail($id);
        $mascota->update($request->all());

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }

    
    public function destroy(string $id)
    {
        $mascota = Mascotas::findOrFail($id);
        $mascota->delete();

        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente.');
    }
}
