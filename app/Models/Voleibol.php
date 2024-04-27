<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voleibol extends Model
{
    use HasFactory;
    protected $table = 'voleibol';
    protected $fillable = [
        'noControl',
        'name',
        'carrera',
        'semestre',
    ];
}
