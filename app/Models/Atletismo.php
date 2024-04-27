<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atletismo extends Model
{
    use HasFactory;
    protected $table = 'atletismo';
    protected $fillable = [
        'noControl',
        'name',
        'carrera',
        'semestre',
    ];
}
