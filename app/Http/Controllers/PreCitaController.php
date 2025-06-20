<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\PreCita;
use Illuminate\Http\Request;

class PreCitaController extends Controller
{
    public function index()
    {
        $precitas = PreCita::with('mascota')->orderBy('id','desc')->paginate(5);
        $mascotas = Mascotas::all();
        return view('admin_panel.pre_citas.index', compact('precitas', 'mascotas'));
    }

    public function destroy($id)
    {
        $precita = PreCita::findOrFail($id);
        $precita->delete();
        return redirect()->route('precitas.index')->with('success', 'Pre-cita eliminada correctamente.');
    }

}
