<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register2');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'apaterno' => ['required', 'string', 'max:255'],
            'amaterno' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'noControl'=>['required','string','max:255'],
            'curp' => ['required', 'string', 'max:255'],
            'nss' => ['required', 'string', 'max:255'],
            'rol'=> ['required','int'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'apaterno' => $request->apaterno,
            'amaterno' => $request->amaterno,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'noControl'=>$request->noControl,
            'rol'=> $request->rol,
            'nss' => $request->nss,
            'curp' => $request->curp,
            
            
        ]);

        return to_route('/extraEscolares/admextraescolares')->with('status', __('Registrado exitosamente'));
    }
}