<?php

use App\Http\Controllers\clubsController;
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
use App\Http\Controllers\listaclubsController;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\RespuestasController;
use App\Http\Controllers\RespuestasEmpleadoresController;
use App\Models\Egresado;
use App\Models\Empleador;
use App\Models\Pregunta;
use App\Models\User;
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

#ruta de inicio, pagina para iniciar sesion 
Route::view('/', 'auth.login')->name('welcome');


Route::middleware('auth')->group(function () {
 
    #rutas de ejemplo
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/extraEscolares/admextraescolares', function () {
        Gate::authorize('see-extraescolares');

        return view('/extraEscolares/admextraescolares');
    })->name('/extraEscolares/admextraescolares');

    Route::get('/extraEscolares/agregarclub', function () {
        Gate::authorize('see-extraescolares');

        return view('/extraEscolares/agregarclub');
    })->name('/extraEscolares/agregarclub');

    //ruta para lista de alumnos
    Route::get('/extraEscolares/alumnos', [ListaController::class, 'index'])->name('extraEscolares.alumnos');

    //ruta para lista de alumnos en los clubs
    Route::get('/extraEscolares/paselista/{id}', [listaclubsController::class, 'index'])->name('extraEscolares.club');
    Route::get('/extraEscolares/asistencia/{id}', [listaclubsController::class, 'lista'])->name('extraEscolares.asistencia');

    //ruta para registrar la asistencia
    Route::get('/extraEscolares/asistencia',[listaclubsController::class,'asistencia'])->name('registro.asistencia');

    //ruta para lista de encargados
    Route::get('/extraEscolares/encargados}', [ListaController::class, 'encargados'])->name('extraEscolares.encargados');

    //rutas para editar encargados
    Route::get('/extraEscolares/editarencargado/{id}',[ListaController::class,'indexen'])->name('encargado.editar');
    Route::get('/extraEscolares/editarencargado',[ListaController::class,'edit'])->name('encargado.editform');
    Route::get('/extraEscolares/{id}/editarencargado',[ListaController::class,'delete'])->name('encargado.eliminar');

    //ruta para editar clubs
    Route::get('/extraEscolares/editarclub/{id}',[clubsController::class,'index'])->name('club.editar');
    Route::put('/extraEscolares/editarclub/{club}',[clubsController::class,'edit'])->name('club.editform');
    Route::get('/extraEscolaress/editarclub/{id}',[clubsController::class,'delete'])->name('club.eliminar');

    //rutas para registrar a clubs

    Route::get('/extraEscolare/registroaclub/{id}',[FormularioclubController::class,'index'])->name('registroaclub.index');
    Route::get('/extraEscolares/registroaclub',[FormularioclubController::class,'store'])->name('registroaclub.store');

    Route::post('/extraEscolares/registroaclub',[FormularioclubController::class,'store'])->name('registroaclub.store');

    Route::get('/extraEscolares', [RegistroclubsController::class, 'index'])->name('extraEscolares.index');

    Route::get('/extraEscolares/agregarclub', [RegistroclubsController::class, 'create'])->name('agregarclub');

    Route::post('/extraEscolares/agregarclub', [RegistroclubsController::class, 'store'])->name('agregarclub.store');

    //ruta para la descarga
    Route::get('/descarga',function(){
        try{
            $template=new \PhpOffice\PhpWord\TemplateProcessor(documentTemplate:'files/Tarjeta de Seguimiento y Verificación.docx');
            $template->setValue(search:'name',replace:auth()->user()->name);
            $template->setValue(search:'carrera',replace:auth()->user()->carrera);
            $template->setValue(search:'nocontrol',replace:auth()->user()->noControl);

            $tempFile=tempnam(sys_get_temp_dir(),'PHPWord');
            $template->saveAs($tempFile);

            $headers = [
                "Content-Type: aplication/octet-stream",
            ];
            return response()->download($tempFile, 'Tarjeta de seguimiento.docx', $headers)->deleteFileAfterSend($shouldDelete = true);

        }catch(\PhpOffice\PhpWord\Exception\Exception $e){
            return back($e->getCode());
        }

    });

    #RUTAS PARA LISTAS DE EGRESADOS

    #retorna la vista de agregar nuevos egresados y empleadores
    Route::get('/seguimiento', function(){ 
        Gate::authorize('see-all');
        return view('seguimiento.index');
    })->name('seguimiento.index');
    #Agrega los datos de un nuevo egresado a la lista en la base de datos
    Route::post('/seguimiemto/agregar/egresados', [EgresadosController::class, 'store'])->name('seguimiento.agregar.store');
    #Ruta que lleva a mostrar la lista de egresados
    Route::get('/seguimiemto/egresados/lista', function(){ 
        Gate::authorize('see-all');
        $egresadosController = new EgresadosController();
        return $egresadosController->show();
    })->name('seguimiento.lista.show');
    #Recupera los datos del agresado a editar
    Route::get('/seguimiento/egresados/{egresado}/editar', function(User $egresado){ 
        Gate::authorize('see-all');
        $egresadoController = new EgresadosController();
        return $egresadoController->edit($egresado);
    })->name('seguimiento.lista.edit');
    #Actualiza el egresado editado y lo sube a la base de datos
    Route::put('/seguimiento/egresados/{egresado}', [EgresadosController::class, 'update'])->name('seguimiento.lista.update');
    #Ruta que elimina un egresado de la BD
    Route::delete('/seguimiento/egresados/{egresado}', [EgresadosController::class, 'destroy'])->name('seguimiento.lista.destroy');
   
    #A PARTIR DE AQUI SON LAS RUTAS DE LAS ENCUESTAS PARA EGRESADOS

    #muestra la vista para crear una encuesta para egresados
    Route::get('/seguimiento/encuesta/egresados', function(){ 
        Gate::authorize('see-all');
        return view('seguimiento.encuestaCrear');
    })->name('seguimiento.encuesta.index');
    #Almacena las preguntas y opciones en la base de datos
    Route::post('/seguimiento/encuesta/agresados', [EncuestaController::class, 'store'])->name('questions.store');
    #muestra la vista para ver las preguntas de una encuesta a egresados
    Route::get('/seguimiento/encuesta/egresados/mostrar', function(){ 
        Gate::authorize('see-all');
        $encuestaController = new EncuestaController();
        return $encuestaController->show();
    })->name('seguimiento.encuesta.show');
    #Editar una pregunta
    Route::get('/seguimiento/encuesta/egresados/{pregunta}/editar', function(Pregunta $pregunta){ 
        Gate::authorize('see-all');
        $encuestaController = new EncuestaController();
        return $encuestaController->edit($pregunta);
    })->name('seguimiento.encuesta.edit');
    #Actualiza la pregunta editada y lo sube a la base de datos
    Route::put('/seguimiento/encuesta/egresados/{pregunta}', [EncuestaController::class, 'update'])->name('seguimiento.encuesta.update');
    #Elimina una pregunta de la encuesta y de la BD
    Route::delete('/seguimiento/encuesta/egresados/{pregunta}', [EncuestaController::class, 'destroy'])->name('seguimiento.encuesta.destroy');
    
    #RUTAS QUE PUEDE USAR UN AGRESADO
    #Muestra la encuesta
    Route::get('/seguimiento/egresado/encuesta', function(){ 
         Gate::authorize('egresados');
         $RespuestasController = new RespuestasController();
        return $RespuestasController->index();
    })->name('seguimiento.responder.encuesta.index');
    #Realiza la accion de almacenar en BD
    #Almacena las preguntas y opciones en la base de datos
    Route::post('/seguimiento/egresado/encuesta/enviar', [RespuestasController::class, 'store'])->name('seguimiento.responder.encuesta.store');

    #RUTAS PARA LISTAS DE EMPLEADORES

    #Ruta por la cual se lleva a cabo el proceso de almacenar los datos de un empleador en BD
    Route::post('/seguimiemto/agregar/empleadores', [EmpleadoresController::class, 'store'])->name('seguimiento.agregarEm.store');
    #Muestra la lista de empleadores
    Route::get('/seguimiemto/empleadores/lista', function(){ 
        Gate::authorize('see-all');
        $empleadoresController = new EmpleadoresController();
        return $empleadoresController->show();
    })->name('seguimiento.listaEm.show');
    #Ruta que lleva al formulario para editar los datos de un empleador
    Route::get('/seguimiento/empleadores/{empleador}/editar', function(User $empleador){ 
        Gate::authorize('see-all');
        $EmpleadoresController = new EmpleadoresController();
        return $EmpleadoresController->edit($empleador);
    })->name('seguimiento.listaEm.edit');
    #Ruta donde que se usa para almacenar los datos editados en la BD
    Route::put('/seguimiento/empleadores/{empleador}', [EmpleadoresController::class, 'update'])->name('seguimiento.listaEm.update');
    #Ruta que elimina un empleador de la BD
    Route::delete('/seguimiento/empleadores/{empleador}', [EmpleadoresController::class, 'destroy'])->name('seguimiento.listaEm.destroy');
    
    #A PARTIR DE AQUI SON LAS RUTAS DE LAS ENCUESTAS PARA EMPLEADORES
    #Muestra la lista de empleadores
    Route::get('/seguimiento/empleadores/lista', function(){ 
        Gate::authorize('see-all');
        return view('seguimiento.showEm');
    })->name('seguimiento.empleadores.show');
    #lleva a cabo el proceso de almacenar los datos de un empleador en BD
    Route::post('/seguimiemto/empleadores', [SeguimientoEmpleadoresController::class, 'store'])->name('seguimientoEg.store');
    #lleva a la vista para crear la encuesta de empleadores
    Route::get('/seguimiento/encuesta/empleadores',function(){ 
        Gate::authorize('see-all');
        $encuestaEmpleadoresController = new EncuestaEmpleadoresController();
        return $encuestaEmpleadoresController->index();
    })->name('seguimiento.encuestaEm.index');
    #Almacena las preguntas y opciones en la base de datos
    Route::post('/seguimiento/encuesta/empleadores', [EncuestaEmpleadoresController::class, 'store'])->name('questionsEm.store');
    #muestra la vista para ver las preguntas de una encuesta a empleadores
    Route::get('/seguimiento/encuesta/empleadores/mostrar', function(){ 
        Gate::authorize('see-all');
        $encuestaEmpleadoresController = new EncuestaEmpleadoresController();
        return $encuestaEmpleadoresController->show();
    })->name('seguimiento.encuestaEm.show');
    #lleva a la vista donde se podra editar una pregunta de la encuesta
    Route::get('/seguimiento/encuesta/empleadores/{pregunta}/editar', function(Pregunta $pregunta){ 
        Gate::authorize('see-all');
        $encuestaEmpleadoresController = new EncuestaEmpleadoresController();
        return $encuestaEmpleadoresController->edit($pregunta);
    })->name('seguimiento.encuestaEm.edit');
    #Actualiza la pregunta editada y lo sube a la base de datos
    Route::put('/seguimiento/encuesta/empleadores/{pregunta}', [EncuestaEmpleadoresController::class, 'update'])->name('seguimiento.encuestaEm.update');
    #Elimina una pregunta de la base de datos
    Route::delete('/seguimiento/encuesta/empleadores/{pregunta}', [EncuestaEmpleadoresController::class, 'destroy'])->name('seguimiento.encuestaEm.destroy');
    
    #RUTAS QUE PUEDE USAR UN EMPLEADOR
    #Muestra la encuesta
    Route::get('/seguimiento/empleador/encuesta', function(){ 
         Gate::authorize('empleadores');
         $RespuestasEmpleadoresController = new RespuestasEmpleadoresController();
        return $RespuestasEmpleadoresController->index();
    })->name('seguimiento.responder.encuestaEm.index');
    #Realiza la accion de almacenar en BD
    #Almacena las preguntas y opciones en la base de datos
    Route::post('/seguimiento/egresado/encuestaEm/enviar', [RespuestasEmpleadoresController::class, 'store'])->name('seguimiento.responder.encuestaEm.store');

    #RUTAS PARA MUESTRAS
    #Lleva a la vista donde se crea la muestra para egresados
    Route::get('/seguimiento/egresados/muestra', function(){ 
        Gate::authorize('see-all');
        return view('seguimiento.muestra');
    })->name('seguimiento.muestra.show');
    #obtiene los datos
    Route::post('/seguimiento/egresados', [SeguimientoController::class, 'muestra'])->name('seguimiento.muestra.store');
    
    #RUTAS PARA VER RESPUESTAS A LAS ENCUESTAS
    #Egresados
    Route::get('/seguimiento/egresados/respuestas', function(){ 
        Gate::authorize('see-all');
        $seguimientoController = new SeguimientoController();
        return $seguimientoController->index();
    })->name('seguimiento.respuestasEg.index');
    #Empleadores
    Route::get('/seguimiento/empleadores/respuestas', function(){ 
        Gate::authorize('see-all');
        $seguimientoController = new SeguimientoController();
        return $seguimientoController->show();
    })->name('seguimiento.respuestasEm.index');

});

require __DIR__.'/auth.php';
