<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtesPlasticas extends Model
{
    use HasFactory;
    protected $table = 'artesplasticas';
    protected $fillable = [
        'noControl',
        'name',
        'carrera',
        'semestre',
    ];
}