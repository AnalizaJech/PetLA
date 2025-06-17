<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\User;
use Illuminate\Http\Request;

class MascotasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mascotas = Mascotas::with('usuario')->get();
        $users = User::all();
        return view('admin_panel.mascotas.index', compact('mascotas', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    //public function create()
    //{
    //    $users = User::all();
    //    return view('admin_panel.mascotas.index',compact('users'));
    //}

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mascota = Mascotas::findOrFail($id);
        return view('admin_panel.mascotas.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mascota = Mascotas::findOrFail($id);
        return view('admin_panel.mascotas.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string',
            'raza' => 'nullable|string',
            'fecha_nacimiento' => 'nullable|date',
            'foto_blob' => 'nullable'
        ]);

        $mascota = Mascotas::findOrFail($id);
        $mascota->update($request->all());

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mascota = Mascotas::findOrFail($id);
        $mascota->delete();

        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente.');
    }
}
