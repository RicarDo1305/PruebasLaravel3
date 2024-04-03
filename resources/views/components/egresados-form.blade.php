<h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">
    {{ $titulo }}
  </h2>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
           <div class="{{$hidden2}}">
           <x-button-seg name="Regresar" ruta="{{$rutaBack}}"/>
           </div>

            <x-formSeg route="{{$ruta}}" :pregunta=$egresado nameButton="{{$button}}" method="{{$metodo}}">
                <div class="space-y-2">
                    <x-text-area name="nombre" placeholder="Nombre" textAreaDev="{{$egresado->name ?? null}}"/>
                    <x-text-area name="email" placeholder="email" textAreaDev="{{$egresado->email ?? null}}"/>
                    <x-text-area name="carrera" placeholder="carrera" textAreaDev=""/>
                    <x-text-area name="noControl" placeholder="numero de control" textAreaDev="{{$egresado->noControl ?? null}}"/>
                </div>
            </x-formSeg>

            <div class="{{$hidden}} flex space-x-5">
            <x-button-seg name="Lista alumnos" ruta="seguimiento.lista.show"/>
            <x-button-seg name="Crear encuesta" ruta="seguimiento.encuesta.index"/>
            <x-button-seg name="Ver encuesta para egresados" ruta="seguimiento.encuesta.show"/>
            </div>
        </div>
        
  </div>