<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolta extends Model
{
    use HasFactory;
    protected $table = 'escolta';
    protected $fillable = [
        'noControl',
        'name',
        'carrera',
        'semestre',
    ];
}