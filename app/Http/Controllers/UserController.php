<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return redirect()->route("duenos.index")->with('success', 'Cliente eliminado correctamente.');
    }
}
