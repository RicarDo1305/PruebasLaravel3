<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taekwondo extends Model
{
    use HasFactory;
    protected $table = 'tae_kwon_do';
    protected $fillable = [
        'noControl',
    ];
}