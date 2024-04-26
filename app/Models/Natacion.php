<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Natacion extends Model
{
    use HasFactory;
    protected $table = 'natacion';
    protected $fillable = [
        'noControl',
    ];
}