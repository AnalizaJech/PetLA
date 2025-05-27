<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreCita extends Model
{
    protected $fillable = [
        'nombre_cliente', 'telefono', 'email', 'fecha_solicitada', 'estado',
    ];

    protected $casts = [
        'fecha_solicitada' => 'datetime',
    ];
}
