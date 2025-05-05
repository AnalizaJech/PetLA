<?php

namespace App\Http\Controllers;
use App\Models\Owner;
use Intervention\Image\Facades\Image;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
{
    $pets = Pet::with('owner')->get();
    return view('pets.index', compact('pets'));
}

public function create()
{
    $owners = Owner::all();
    return view('pets.create', compact('owners'));
}

    public function store(Request $request)
{
    $request->validate([
        'owner_id' => 'required|exists:owners,id',
        'name' => 'required|string|max:50',
        'species' => 'required|string|max:50',
        'breed' => 'required|string|max:50',
        'birthdate' => 'required|date|before:today',
        'gender' => 'required|in:Macho,Hembra',
        'image' => 'nullable|image|mimes:jpg,png|max:2048',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $resized = \Image::make($image)
            ->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 75); // calidad 75%
    
        $data['image'] = $resized->getEncoded();
    }
    

    Pet::create($data);

    return redirect()->route('pets.index')->with('success', 'Mascota registrada.');
}

public function update(Request $request, Pet $pet)
{
    $request->validate([
        'owner_id' => 'required|exists:owners,id',
        'name' => 'required|string|max:50',
        'species' => 'required|string|max:50',
        'breed' => 'required|string|max:50',
        'birthdate' => 'required|date|before:today',
        'gender' => 'required|in:Macho,Hembra',
        'image' => 'nullable|image|mimes:jpg,png|max:2048',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $resized = \Image::make($image)
            ->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode('jpg', 75); // calidad 75%
    
        $data['image'] = $resized->getEncoded();
    }
    

    $pet->update($data);

    return redirect()->route('pets.index')->with('success', 'Mascota actualizada.');
}


public function edit(Pet $pet)
{
    $owners = Owner::all();
    $speciesList = ['Perro', 'Gato', 'Conejo', 'Hámster', 'Ave', 'Tortuga', 'Erizo', 'Hurón', 'Reptil', 'Pez', 'Caballo', 'Cerdo miniatura', 'Otro'];
    $breedList = ['Labrador Retriever', 'Pastor Alemán', 'Bulldog Francés', 'Chihuahua', 'Pug', 'Shih Tzu', 'Golden Retriever', 'Schnauzer', 'Doberman', 'Gato Persa', 'Gato Siamés', 'Gato Bengalí', 'Conejo Enano', 'Conejo Rex', 'Otro'];

    return view('pets.edit', compact('pet', 'owners', 'speciesList', 'breedList'));
}


public function show(Pet $pet)
{
    return view('pets.show', compact('pet'));
}

public function destroy(Pet $pet)
{
    $pet->delete();
    return redirect()->route('pets.index')->with('success', 'Mascota eliminada.');
}
}
