<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'species',
        'breed',
        'birthdate',
        'gender',
        'image',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
