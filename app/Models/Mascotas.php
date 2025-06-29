<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mascotas extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "nombre",
        "especie",
        "peso",
        "sexo",
        "raza",
        "fecha_nacimiento",
        "foto_blob"
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function precitas()
    {
        return $this->hasMany(PreCita::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
