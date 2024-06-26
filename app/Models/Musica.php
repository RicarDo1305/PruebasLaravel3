<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;
    protected $table = 'musica';
    protected $fillable = [
        'noControl',
        'name',
        'carrera',
        'semestre',
    ];
}