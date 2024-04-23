<div class="flex items-stretch justify-center">
  <h2 class="mt-2 md:mt-3 -mb-10 md:-mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
    {{ $titulo }}
  </h2> 

  <div class="{{ $hidden }}">
    <x-dropdown-seg 
    rutaLista="seguimiento.listaEm.show"
    rutaEncuesta="seguimiento.encuestaEm.index"
    rutaEncuestaLista="seguimiento.encuestaEm.show"
    rutaRespuestas="seguimiento.respuestasEm.index"
    />
  </div>
</div>
  
  <div class="py-12 {{ $hidden == 'hidden' ? 'mt-2' : '-mt-10' }}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <div class="{{$hidden2}} ml-2 md:ml-0">
           <x-button-seg name="Regresar" ruta="{{$rutaBack}}"/>
           </div>

            <x-formSeg route="{{ $ruta }}" :pregunta=$empleador nameButton="{{$button}}" method="{{$metodo}}">
                <div class="space-y-2">
                <x-text-area name="nombreEm" placeholder="Nombre de la empresa" textAreaDev="{{$empleador->name ?? null}}"/>
                <x-text-area name="ubicacion" placeholder="Ubicacion" textAreaDev="{{$empleador->ubicacion ?? null}}"/>
                <x-text-area name="email" placeholder="Email" textAreaDev="{{$empleador->email ?? null}}"/>  
                </div>
            </x-formSeg>

        </div>
        
  </div>