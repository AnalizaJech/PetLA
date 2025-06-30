<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Mascotas;
use App\Models\PreCita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class PreCitaController extends Controller
{
    public function index()
    {

        if(Auth::user()->role =="cliente"){
            $precitas = PreCita::whereHas('mascota', function($q) {
                $q->where('user_id', Auth::id() ); 
                })
                ->orderBy('id','desc')
                ->get();

            $mascotas = Mascotas::where("user_id", Auth::id())
                ->orderBy("nombre","desc")
                ->get();

            return view('cliente_panel.pre_citas.index', compact('precitas','mascotas'));
        }

        $mascotas = Mascotas::all();
        $precitas = PreCita::with('mascota')->orderBy('id','desc')->paginate(5);
        $veterinarios= User::where('role', 'veterinario')->get();
        $estadisticas = [
            'total'      => PreCita::count(),
            'pendientes' => PreCita::where('estado', 'pendiente')->count(),
            'aprobadas'  => PreCita::where('estado', 'aprobado')->count(),
            'rechazadas' => PreCita::where('estado', 'rechazado')->count(),
            
        ];
        return view('admin_panel.pre_citas.index', compact('precitas', 'mascotas','veterinarios')+ $estadisticas);
    }

    public function destroy($id)
    {
        $precita = PreCita::findOrFail($id);
        $precita->delete();
        return redirect()->route('precitas.index')->with('success', 'Pre cita eliminada correctamente.');
    }

    public function create()
    {
        $precitas = PreCita::all();
        $mascotas = Mascotas::all();
        return view('admin_panel.pre_citas.create', compact('precitas', 'mascotas'));
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'mascota_id' => 'required',
            'fecha_solicitada' => 'required|date',
            'rango_hora'=> 'required|string',
            'motivo' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,aprobado,rechazado',
            'observaciones' => 'nullable|string|max:500',
        ]);

        PreCita::create($request->all());

        return redirect()->route('precitas.index')->with('success', 'Pre cita creada correctamente.');
    }

    public function edit(string $id)
    {
        $precita = PreCita::findOrFail($id);
        $mascotas = Mascotas::all();
        return view('admin_panel.pre_citas.edit', compact('precita', 'mascotas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'mascota_id' => 'required',
            'fecha_solicitada' => 'required|date',
            'rango_hora'=> 'required|string',
            'motivo' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,aprobado,rechazado',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $precita = PreCita::findOrFail($id);
        $precita->update($request->all());
        return redirect()->route('precitas.index')->with('success', 'Pre cita actualizada correctamente.');
    }

    public function procesarAccion(Request $request, $id)
    {
        $preCita = PreCita::findOrFail($id);
        $accion = $request->input('accion');

        if ($accion === 'aceptar') {

            // actualizo la pre cita
            $preCita->estado = 'aprobado';
            $preCita->observaciones = $request->input('notas');
            $preCita->save();
            
            // creo la cita
            $veterinario= $request->input('veterinario_id');

            Cita::create([
                'mascota_id' => $preCita->mascota_id,
                'veterinario_id' => $veterinario,
                'fecha_hora' => $preCita->fecha_solicitada,
                'motivo' => $preCita->motivo,
                'estado' => 'pendiente',
            ]);
        }

        if ($accion === 'cambiar_fecha') {
            $preCita->estado = 'pendiente';
            $preCita->veterinario_id = $request->input('veterinario_id');
            $preCita->observaciones = $request->input('notas');
            $preCita->fecha_solicitada = $request->input('nueva_fecha');
            $preCita->save();
        }

        if ($accion === 'rechazar') {
            $preCita->estado = 'rechazado';
            $preCita->observaciones = $request->input('notas');
            $preCita->save();
        }

        return redirect()->back()->with('success', 'Acción procesada correctamente.');
    }
}
