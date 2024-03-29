<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pregunta extends Model
{
    protected $fillable = [
        'pregunta',
    ];

    public function opciones(): HasMany
    {
        return $this->hasMany(Opcion::class);
    }
}