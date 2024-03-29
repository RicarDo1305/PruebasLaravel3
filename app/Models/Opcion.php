<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
