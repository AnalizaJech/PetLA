<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cita_id',
        'diagnostico',
        'tratamiento',
        'observaciones',
    ];
    public function cita()
    {
        return $this->belongsTo(Cita::class, 'cita_id');
    }
}
