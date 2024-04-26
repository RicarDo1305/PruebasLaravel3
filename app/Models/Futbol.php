<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Futbol extends Model
{
    use HasFactory;
    protected $table = 'futbol';
    protected $fillable = [
        'noControl',
    ];
}