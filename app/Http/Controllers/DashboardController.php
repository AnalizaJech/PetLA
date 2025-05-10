<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class DashboardController extends Controller // ← ESTO FALTABA
{
    public function index()
{
    
    $appointments = \App\Models\Appointment::all()->map(function ($a) {
        return [
            'title' => $a->title,
            'start' => $a->start,
            'end'   => $a->end,
        ];
    });

    return view('dashboard', compact('appointments'));
}


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start' => 'required|date',
            'end'   => 'required|date|after_or_equal:start',
        ]);

        Appointment::create($request->all());

        return response()->json(['success' => true]);
    }
}
