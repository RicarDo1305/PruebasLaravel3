<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanzaFolclorica extends Model
{
    use HasFactory;
    protected $table = 'danza_folclorica';
    protected $fillable = [
        'noControl',
        'name',
        'carrera',
        'semestre',
    ];
}