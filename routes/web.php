<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExtraEscolaresController;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\SeguimientoEmpleadoresController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\RegistroclubsController;
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

    Route::get('/extraEscolares/paselista', function () {
        Gate::authorize('see-clubs');

        return view('/extraEscolares/paselista');
    })->name('/extraEscolares/paselista');

    Route::get('/extraEscolares/index', function () {
        Gate::authorize('clubs');

        return view('/extraEscolares/index');
    })->name('/extraEscolares/paselista');

    Route::get('agregarclub', [RegistroclubsController::class, 'create'])
    ->name('agregarclub');

Route::post('agregarclub', [RegistroclubsController::class, 'store']);

    Route::get('/extraEscolares',[ExtraEscolaresController::class, 'index'])->name('extraEscolares.index');

    #rutas para el modulo de seguimiento a egresados y empleadores
    #retorna la vista de agregar nuevos egresados y empleadores
    Route::get('/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento.index');

    #Ruta que lleva a la vista para mostrar lista de alumnos
    Route::get('/seguimiento/egresados/lista', [SeguimientoController::class, 'show'])->name('seguimiento.show');
    #lleva a cabo el proceso de almacenar los datos de un alumno agresado en BD
    Route::post('/seguimiemto/egresados', [SeguimientoController::class, 'store'])->name('seguimiento.store');

    #Muestra la lista de empleadores
    Route::get('/seguimiento/empleadores/lista', [SeguimientoEmpleadoresController::class, 'show'])->name('seguimientoEg.show');
    #lleva a cabo el proceso de almacenar los datos de un empleador en BD
    Route::post('/seguimiemto/empleadores', [SeguimientoEmpleadoresController::class, 'store'])->name('seguimientoEg.store');
    Route::get('/seguimiento/encuesta', [EncuestaController::class, 'index'])->name('seguimiento.encuesta.index');
    Route::post('/seguimiento/encuesta', [EncuestaController::class, 'store'])->name('questions.store');


});

require __DIR__.'/auth.php';
