<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\ExtraEscolaresController;
=======
use App\Http\Controllers\SeguimientoController;
>>>>>>> 5dd1dc901c635303fb86b940b163e47054b3bf09
use App\Models\Chirp;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

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
<<<<<<< HEAD

=======
#ruta de inicio, pagina welcome
>>>>>>> 5dd1dc901c635303fb86b940b163e47054b3bf09
Route::view('/', 'welcome')->name('welcome');

#Route::get('/chirps/{chirp}', function($chirp){
#    if ($chirp == '2'){
#        return to_route('chirps.index');
#    }
#    return 'Chirp detail '.$chirp;
#});

Route::middleware('auth')->group(function () {
<<<<<<< HEAD

=======
 
    #rutas de ejemplo
>>>>>>> 5dd1dc901c635303fb86b940b163e47054b3bf09
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');

    Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');

    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');

    Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');

    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');

<<<<<<< HEAD
    Route::get('/extraEscolares',[ExtraEscolaresController::class, 'index'])->name('extraEscolares.index');
=======
    #rutas para el modulo de seguimiento a egresados y empleadores
    Route::get('/seguimiento', [SeguimientoController::class, 'index'])->name('seguimiento.index');
    Route::post('/seguimiemto', [SeguimientoController::class, 'store'])->name('seguimiento.store');

>>>>>>> 5dd1dc901c635303fb86b940b163e47054b3bf09

});

require __DIR__.'/auth.php';
