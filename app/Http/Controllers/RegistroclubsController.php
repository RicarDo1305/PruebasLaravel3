<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Clubs;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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

    public function create(){
        $encargados=User::where('rol',3)->get();
         return view('/extraEscolares/agregarclub', [
            'encargados' => $encargados
        ]);
        return view('/extraEscolares/agregarclub');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => ['required','mimes:jpeg,png,jpg|max:10240'],
            'title' => ['required', 'string','max:255',],
            'incharge' => ['required','string','max:255'],
            'description'=>['required','string','max:255'],
        ]);

        if($request->hasFile('img')){
            $file = $request->file('img');
            $destinationPath = 'img/';
            $filename = $file->getClientOriginalName();
            $uploadsucces = $request->file('img')->move($destinationPath,$filename);
            $clubs = Clubs::create([
            

                'img' => $filename,
                'title' => $request->title,
                'incharge' =>$request->incharge,
                'description'=>$request->description,
            ]);
    
            return to_route('agregarclub.store')->with('status', __('Creado exitosamente'));
        }
        

       


        
    }

}