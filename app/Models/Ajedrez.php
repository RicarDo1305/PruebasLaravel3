<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ajedrez extends Model
{
    use HasFactory;
    protected $table = 'ajedrez';
    protected $fillable = [
        'noControl',
    ];
}
