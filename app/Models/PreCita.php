<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PreCita extends Model
{
    protected $fillable = [
        'mascota_id', 
        'motivo', 
        'fecha_solicitada', 
        'rango_hora', 
        'estado',
        'observaciones',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascotas::class, 'mascota_id');
    }
}
