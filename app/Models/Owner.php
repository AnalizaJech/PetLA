<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni', 'name', 'lastname', 'email', 'phone', 'address', 'image'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }

}
