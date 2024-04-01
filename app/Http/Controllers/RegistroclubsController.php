<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Symfony\Component\Mime\MimeTypes;

class RegistroclubsController extends Controller
{
    public function index()
    {
        return view('extraEscolares.index', [
            'tarjetas' => Clubs::all(),
        ]);
        return view('extraEscolares.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => ['required'],
            'title' => ['required', 'string','max:255',],
            'incharge' => ['required','string','max:255'],
            'description'=>['required','string','max:255'],
        ]);

        $clubs = Clubs::create([
            

            'img' => $request->img,
            'title' => $request->title,
            'incharge' =>$request->incharge,
            'description'=>$request->description,
        ]);

       return back();
    }

}