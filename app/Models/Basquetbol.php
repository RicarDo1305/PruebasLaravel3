<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basquetbol extends Model
{
    use HasFactory;
    protected $table = 'basquetbol';
    protected $fillable = [
        'noControl',
    ];
}