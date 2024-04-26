<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clubs;
use App\Models\ArtesPlasticas;
use App\Models\DanzaFolclorica;
use App\Models\Musica;
use App\Models\Piano;
use App\Models\Escolta;
use App\Models\BandadeGuerra;
use App\Models\Futbol;
use App\Models\Voleibol;
use App\Models\Basquetbol;
use App\Models\Ajedrez;
use App\Models\Atletismo;
use App\Models\Taekwondo;
use App\Models\Natacion;


class FormularioclubController extends Controller
{

    public function index($id)
    {
        $club = Clubs::where('id', $id)->first();
        $campo = $club->title;
        $clubs = Clubs::all();
        return view('/extraEscolares/registroaclub', ['clubs' => $clubs], ['id' => $campo]);
    }

    public function store(Request $request)
    //{{ auth()->user()->name }}
    {
        $request->validate([
            'carrera' => ['required'],
            'semestre' => ['required', 'string'],
            'sexo' => ['required', 'string'],
            'nss' => ['required', 'string', 'max:255'],
            'club' => ['required', 'string'],
            'fechaingreso' => ['required', 'string'],
            'tiposangre' => ['required', 'string'],
            'nombretutor' => ['required', 'string'],
            'telefonotutor' => ['required', 'string'],
            'padecimiento' => ['required', 'string'],
            'parentesco' => ['required', 'string'],
            'telefonoparticular' => ['required', 'string'],
            'estatura' => ['required', 'string'],
            'peso' => ['required', 'string'],
            'curp' => ['required', 'string'],

        ]);

        $nombrec = $request->club;
        switch ($nombrec) {
            case 'Atletismo':
                $club = Atletismo::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'DanzaFolclorica':
                $club = DanzaFolclorica::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'ArtesPlasticas':
                $club = ArtesPlasticas::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'Musica':
                $club = Musica::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'Piano':
                $club = Piano::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'Escolta':
                $club = Escolta::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'BandaDeGuerra':
                $club = BandadeGuerra::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'Futbol':
                $club = Futbol::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'Voleibol':
                $club = Voleibol::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'Basquetbol':
                $club = Basquetbol::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'Ajedrez':
                $club = Ajedrez::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'TaeKwonDo':
                $club = Taekwondo::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
            case 'Natacion':
                $club = Natacion::Create([
                    'noControl' => auth()->user()->noControl,
                ]);
                break;
        }


        $clubs = Clubs::all();
        User::where('id',  auth()->user()->id)
            ->update(
                [
                    'carrera' => $request->input('carrera'),
                    'semestre' => $request->input('semestre'),
                    'sexo' => $request->input('sexo'),
                    'nss' => $request->input('nss'),
                    'club' => $request->input('club'),
                    'fechaingreso' => $request->input('fechaingreso'),
                    'tiposangre' => $request->input('tiposangre'),
                    'nombretutor' => $request->input('nombretutor'),
                    'telefonotutor' => $request->input('telefonotutor'),
                    'padecimiento' => $request->input('padecimiento'),
                    'parentesco' => $request->input('parentesco'),
                    'telefonoparticular' => $request->input('telefonoparticular'),
                    'estatura' => $request->input('estatura'),
                    'peso' => $request->input('peso'),
                    'curp' => $request->input('curp')
                ]
            );

        return to_route('extraEscolares.index')->with('status', __('Registrado exitosamente'));
    }
}
