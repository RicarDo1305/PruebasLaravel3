<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\EgresadosController;
use App\Http\Controllers\EmpleadoresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExtraEscolaresController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SeguimientoEmpleadoresController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\RegistroclubsController;
use App\Http\Controllers\EncuestaEmpleadoresController;
use App\Http\Controllers\FormularioclubController;
use App\Http\Controllers\ListaController;
use App\Models\Chirp;
use App\Models\Empleador;
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

    Route::get('/extraEscolare/registroaclub',[FormularioclubController::class,'index'])->name('registroaclub.index');
    Route::get('/extraEscolares/registroaclub',[FormularioclubController::class,'store'])->name('registroaclub.store');

    Route::post('/extraEscolares/registroaclub',[FormularioclubController::class,'store'])->name('registroaclub.store');


    Route::get('/extraEscolares/paselista', function () {
        Gate::authorize('see-clubs');

        return view('/extraEscolares/paselista');
    })->name('/extraEscolares/paselista');

    Route::get('/extraEscolares', [RegistroclubsController::class, 'index'])->name('extraEscolares.index');

    Route::get('/extraEscolares/agregarclub', [RegistroclubsController::class, 'create'])
    ->name('agregarclub');

    Route::post('/extraEscolares/agregarclub', [RegistroclubsController::class, 'store'])->name('agregarclub.store');

    #RUTAS PARA LISTAS DE EGRESADOS

    #retorna la vista de agregar nuevos egresados y empleadores
    Route::get('/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento.index');
    #Agrega los datos de un nuevo egresado a la lista en la base de datos
    Route::post('/seguimiemto/agregar/egresados', [EgresadosController::class, 'store'])->name('seguimiento.agregar.store');
    #Ruta que lleva a mostrar la lista de egresados
    Route::get('/seguimiemto/egresados/lista', [EgresadosController::class, 'show'])->name('seguimiento.lista.show');
    #Recupera los datos del agresado a editar
    Route::get('/seguimiento/egresados/{egresado}/editar', [EgresadosController::class, 'edit'])->name('seguimiento.lista.edit');
    #Actualiza el egresado editado y lo sube a la base de datos
    Route::put('/seguimiento/egresados/{egresado}', [EgresadosController::class, 'update'])->name('seguimiento.lista.update');
    #Ruta que elimina un egresado de la BD
    Route::delete('/seguimiento/egresados/{egresado}', [EgresadosController::class, 'destroy'])->name('seguimiento.lista.destroy');
   
    #A PARTIR DE AQUI SON LAS RUTAS DE LAS ENCUESTAS PARA EGRESADOS

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

    #RUTAS PARA LISTAS DE EMPLEADORES

    #Ruta por la cual se lleva a cabo el proceso de almacenar los datos de un empleador en BD
    Route::post('/seguimiemto/agregar/empleadores', [EmpleadoresController::class, 'store'])->name('seguimiento.agregarEm.store');
    #Muestra la lista de empleadores
    Route::get('/seguimiemto/empleadores/lista', [EmpleadoresController::class, 'show'])->name('seguimiento.listaEm.show');
    #Ruta que lleva al formulario para editar los datos de un empleador
    Route::get('/seguimiento/empleadores/{empleador}/editar', [EmpleadoresController::class, 'edit'])->name('seguimiento.listaEm.edit');
    #Ruta donde que se usa para almacenar los datos editados en la BD
    Route::put('/seguimiento/empleadores/{empleador}', [EmpleadoresController::class, 'update'])->name('seguimiento.listaEm.update');
    #Ruta que elimina un empleador de la BD
    Route::delete('/seguimiento/empleadores/{empleador}', [EmpleadoresController::class, 'destroy'])->name('seguimiento.listaEm.destroy');

    #A PARTIR DE AQUI SON LAS RUTAS DE LAS ENCUESTAS PARA EMPLEADORES
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
