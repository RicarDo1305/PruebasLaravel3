<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piano extends Model
{
    use HasFactory;
    protected $table = 'piano';
    protected $fillable = [
        'noControl',
    ];
}