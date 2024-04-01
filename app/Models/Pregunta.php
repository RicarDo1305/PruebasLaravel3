<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pregunta extends Model
{
    protected $fillable = [
        'pregunta',
        'tipo',
        'user_id',
    ];

    public function opciones(): HasMany
    {
        return $this->hasMany(Opcion::class);
    }

    public function user():BelongsTo{

        return $this->belongsTo(User::class);
    }
}