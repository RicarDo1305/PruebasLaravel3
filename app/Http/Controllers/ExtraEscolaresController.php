<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;

class ExtraEscolaresController extends Controller
{
    public function index()
    {
        return view('extraEscolares.index');
    
    }
}
