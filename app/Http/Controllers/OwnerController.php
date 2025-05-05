<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
{
    $owners = Owner::all();
    return view('owners.index', compact('owners'));
}


public function create()
{
    return view('owners.create');
}


public function store(Request $request)
{
    $request->validate([
        'dni' => 'required|unique:owners,dni|max:20',
        'name' => 'required|string|max:50',
        'lastname' => 'required|string|max:50',
        'email' => 'required|email|unique:owners,email',
        'phone' => 'required|max:15',
        'address' => 'required|string|max:100',
        'image' => 'nullable|image|mimes:jpg,png|max:2048',
    ], [
        'dni.unique' => 'Este DNI ya está registrado.',
        'email.unique' => 'Este email ya está registrado.',
        'image.mimes' => 'La imagen debe ser JPG o PNG.',
        'image.max' => 'La imagen no debe pesar más de 2MB.',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $data['image'] = file_get_contents($request->file('image'));
    }

    Owner::create($data);

    return redirect()->route('owners.index')->with('success', 'Dueño creado correctamente.');
}



public function show(Owner $owner)
{
    return view('owners.show', compact('owner'));
}


public function edit(Owner $owner)
{
    return view('owners.edit', compact('owner'));
}

public function update(Request $request, Owner $owner)
{
    $request->validate([
        'dni' => 'required|max:20|unique:owners,dni,' . $owner->id,
        'name' => 'required|string|max:50',
        'lastname' => 'required|string|max:50',
        'email' => 'required|email|unique:owners,email,' . $owner->id,
        'phone' => 'required|max:15',
        'address' => 'required|string|max:100',
        'image' => 'nullable|image|mimes:jpg,png|max:2048',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $data['image'] = file_get_contents($request->file('image'));
    }

    $owner->update($data);

    return redirect()->route('owners.index')->with('success', 'Dueño actualizado correctamente.');
}


public function destroy(Owner $owner)
{
    $owner->delete();

    return redirect()->route('owners.index')->with('success', 'Dueño eliminado correctamente.');
}

}
