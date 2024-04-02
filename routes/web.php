<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExtraEscolaresController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SeguimientoEmpleadoresController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\RegistroclubsController;
use App\Http\Controllers\EncuestaEmpleadoresController;
use App\Http\Controllers\ListaController;
use App\Models\Chirp;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
#ruta de inicio, pagina welcome
Route::view('/', 'welcome')->name('welcome');

#Route::get('/chirps/{chirp}', function($chirp){
#    if ($chirp == '2'){
#        return to_route('chirps.index');
#    }
#    return 'Chirp detail '.$chirp;
#});

Route::middleware('auth')->group(function () {
 
    #rutas de ejemplo
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');

    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');

    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');

    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');

    Route::get('/extraEscolares/admextraescolares', function () {
        Gate::authorize('see-extraescolares');

        return view('/extraEscolares/admextraescolares');
    })->name('/extraEscolares/admextraescolares');

    Route::get('/extraEscolares/agregarclub', function () {
        Gate::authorize('see-extraescolares');

        return view('/extraEscolares/agregarclub');
    })->name('/extraEscolares/agregarclub');


    Route::get('/extraEscolares/alumnos', [ListaController::class, 'index'])->name('extraEscolares.alumnos');


    Route::get('/extraEscolares/paselista', function () {
        Gate::authorize('see-clubs');

        return view('/extraEscolares/paselista');
    })->name('/extraEscolares/paselista');

    Route::get('/extraEscolares', [RegistroclubsController::class, 'index'])->name('extraEscolares.index');

    Route::get('agregarclub', [RegistroclubsController::class, 'create'])
    ->name('agregarclub');

Route::post('agregarclub', [RegistroclubsController::class, 'store']);


    #rutas para el modulo de seguimiento a egresados y empleadores
    #retorna la vista de agregar nuevos egresados y empleadores
    Route::get('/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento.index');

    #Ruta que lleva a la vista para mostrar lista de alumnos
    Route::get('/seguimiento/egresados/lista', [SeguimientoController::class, 'show'])->name('seguimiento.show');
    #lleva a cabo el proceso de almacenar los datos de un alumno agresado en BD
    Route::post('/seguimiemto/egresados', [SeguimientoController::class, 'store'])->name('seguimiento.store');
    #muestra la vista para crear una encuesta para egresados
    Route::get('/seguimiento/encuesta/egresados', [EncuestaController::class, 'index'])->name('seguimiento.encuesta.index');
    #Almacena las preguntas y opciones en la base de datos
    Route::post('/seguimiento/encuesta/agresados', [EncuestaController::class, 'store'])->name('questions.store');
    #muestra la vista para ver las preguntas de una encuesta a egresados
    Route::get('/seguimiento/encuesta/egresados/mostrar', [EncuestaController::class, 'show'])->name('seguimiento.encuesta.show');
    #Editar una pregunta
    Route::get('/seguimiento/encuesta/egresados/{pregunta}/editar', [EncuestaController::class, 'edit'])->name('seguimiento.encuesta.edit');
    #Actualiza la pregunta editada y lo sube a la base de datos
    Route::put('/seguimiento/encuesta/egresados/{pregunta}', [EncuestaController::class, 'update'])->name('seguimiento.encuesta.update');
    #Elimina una pregunta de la encuesta y de la BD
    Route::delete('/seguimiento/encuesta/egresados/{pregunta}', [EncuestaController::class, 'destroy'])->name('seguimiento.encuesta.destroy');

    #Muestra la lista de empleadores
    Route::get('/seguimiento/empleadores/lista', [SeguimientoEmpleadoresController::class, 'show'])->name('seguimiento.empleadores.show');
    #lleva a cabo el proceso de almacenar los datos de un empleador en BD
    Route::post('/seguimiemto/empleadores', [SeguimientoEmpleadoresController::class, 'store'])->name('seguimientoEg.store');
    #lleva a la vista para crear la encuesta de empleadores
    Route::get('/seguimiento/encuesta/empleadores', [EncuestaEmpleadoresController::class, 'index'])->name('seguimiento.encuestaEm.index');
    #Almacena las preguntas y opciones en la base de datos
    Route::post('/seguimiento/encuesta/empleadores', [EncuestaEmpleadoresController::class, 'store'])->name('questionsEm.store');
    #muestra la vista para ver las preguntas de una encuesta a empleadores
    Route::get('/seguimiento/encuesta/empleadores/mostrar', [EncuestaEmpleadoresController::class, 'show'])->name('seguimiento.encuestaEm.show');
    Route::get('/seguimiento/encuesta/empleadores/{pregunta}/editar', [EncuestaEmpleadoresController::class, 'edit'])->name('seguimiento.encuestaEm.edit');
    #Actualiza la pregunta editada y lo sube a la base de datos
    Route::put('/seguimiento/encuesta/empleadores/{pregunta}', [EncuestaEmpleadoresController::class, 'update'])->name('seguimiento.encuestaEm.update');
    #Elimina una pregunta de la base de datos
    Route::delete('/seguimiento/encuesta/empleadores/{pregunta}', [EncuestaEmpleadoresController::class, 'destroy'])->name('seguimiento.encuestaEm.destroy');
});

require __DIR__.'/auth.php';
