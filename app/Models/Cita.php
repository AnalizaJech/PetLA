<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        'mascota_id',
        'veterinario_id',
        'fecha_hora',
        'motivo',
        'estado',
    ];

    public function mascota()
    {
        return $this->belongsTo(Mascotas::class, 'mascota_id');
    }
    public function veterinario()
    {
        return $this->belongsTo(User::class, 'veterinario_id');
    }
    public function atencion()
    {
        return $this->hasOne(Atencion::class);
    }
}
