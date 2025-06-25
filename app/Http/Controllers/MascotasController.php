<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use App\Models\User;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class MascotasController extends Controller
{
    
    public function index()
    {
        if (Auth::user()->role === 'cliente') {
            $mascotas = Mascotas::where('user_id', Auth::id())->get();
            return view('cliente_panel.mis_mascotas.index', compact('mascotas'));
        }
        $mascotas = Mascotas::with('usuario')->orderBy('id','desc')->paginate(5);
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
            'foto_blob' => 'nullable|image|mimes:png,jpg|max:5000'
        ]);

        // STEP SAVE IMAGE
        $rutaImg=null;
        if($request->hasFile("foto_blob")){
            $file = $request->file("foto_blob");
            $rutaImg= $file->store("Macotas",["disk" => "public"]);
            // 2da forma
            // $file->storeAs("Mascotas",$name,["disk"=>"public"]);
        }

        // CREATE
        $data= $request->only("user_id","nombre","especie","raza", "fecha_nacimiento");
        $data["foto_blob"] = $rutaImg;
        Mascotas::create($data);
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
            'foto_blob' => 'nullable|image|mimes:png,jpg|max:5000'
        ]);

        $mascota = Mascotas::findOrFail($id);

        if($request->hasFile('foto_blob')){
            // si hay new img lo guarda
            $file = $request->file("foto_blob");
            $rutaImg= $file->store("Macotas",["disk" => "public"]);

            // Borra la imagen anterior si existe
            if ($mascota->foto_blob) {
                FacadesStorage::disk('public')->delete($mascota->foto_blob);
            }

            $mascota->foto_blob = $rutaImg;

        }
        
        $mascota->user_id = $request->user_id;
        $mascota->nombre = $request->nombre;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->fecha_nacimiento = $request->fecha_nacimiento;
        $mascota->save();

        return redirect()->route('mascotas.index')->with('success', 'Mascota actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $mascota = Mascotas::findOrFail($id);
        // Borra la imagendel storage
        if ($mascota->foto_blob) {
            FacadesStorage::disk('public')->delete($mascota->foto_blob);
        }

        // borramos la data 
        $mascota->delete();

        return redirect()->route('mascotas.index')->with('success', 'Mascota eliminada correctamente.');
    }

}
