<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Opcion extends Model
{
    protected $fillable = [
        'opcion',
        'pregunta_id',

    ];
    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }

    public function user():BelongsTo{

        return $this->belongsTo(User::class);
    }
}
