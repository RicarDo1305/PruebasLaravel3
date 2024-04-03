<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Egresado extends Model
{

    protected $fillable = [
        'name',
        'email',
        'password',
        'noControl',
        'rol',
    ];


    public function user():BelongsTo{

        return $this->belongsTo(User::class);
    }
}
