<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desfile extends Model
{
    use HasFactory;
    protected $table = 'desfile';
    protected $fillable = [
        'noControl',
        'name',
        'carrera',
        'semestre',
    ];
}
