  <div class="flex items-stretch justify-center">
  <h2 class="mt-2 md:mt-3 -mb-10 md:-mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
    {{ $titulo }}
  </h2>
    <div class="{{ $hidden }}">
    <x-dropdown-seg 
    rutaLista="seguimiento.lista.show"
    rutaEncuesta="seguimiento.encuesta.index"
    rutaEncuestaLista="seguimiento.encuesta.show"
    rutaRespuestas="seguimiento.respuestasEg.index"
    rutaSubirReporte="dashboard"
    />
    </div>
  </div>
  <div class="py-12 {{ $hidden == 'hidden' ? 'mt-2' : '-mt-10' }}">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
           <div class="{{$hidden2}} ml-2 md:ml-0">
           <x-button-seg name="Regresar" ruta="{{$rutaBack}}"/>
           </div>

            <x-formSeg route="{{$ruta}}" :pregunta=$egresado nameButton="{{$button}}" method="{{$metodo}}">
                <div class="space-y-2">
                    <x-text-area name="nombre" placeholder="Nombre" textAreaDev="{{$egresado->name ?? null}}"/>
                    <x-text-area name="email" placeholder="email" textAreaDev="{{$egresado->email ?? null}}"/>
                    <x-text-area name="carrera" placeholder="carrera" textAreaDev="{{$egresado->carrera ?? null}}"/>
                    <x-text-area name="noControl" placeholder="numero de control" textAreaDev="{{$egresado->noControl ?? null}}"/>
                </div>
            </x-formSeg>


        </div>

        
        
  </div>