<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BandadeGuerra extends Model
{
    use HasFactory;
    protected $table = 'bandade_guerra';
    protected $fillable = [
        'noControl',
    ];
}