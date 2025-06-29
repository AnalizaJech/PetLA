<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function indexDueno()
    {
        $duenos= User::where("role","cliente")->paginate(5);
        return view('admin_panel.duenos.index', compact('duenos'));
    }
    
    public function indexVeterinario()
    {
        $veterinarios= User::where("role","veterinario")->paginate(5);
        return view('admin_panel.veterinarios.index', compact('veterinarios'));
    }

    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        if(Auth::user()->role=="veterinario"){
            return redirect()->route("veterinarios.index")->with('success', 'Veterinario eliminado correctamente.');
        }
        return redirect()->route("duenos.index")->with('success', 'Cliente eliminado correctamente.');
    }
}
