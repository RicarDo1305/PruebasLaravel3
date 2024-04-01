<x-app-layout>
<x-header-seg hidden="hidden" titulo="Seguimiento a agresados y empleadores"/>

<h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">
    Editar pregunta
  </h2>

<div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    

 <x-formSeg route="seguimiento.encuestaEm.update" pregunta="{{ $pregunta->id }}" nameButton="Enviar" method="PUT">
                <div class="space-y-2">
                    <x-text-area name="Pregunta" placeholder="Pregunta" textAreaDev="{{ $pregunta->pregunta }}"/>
                    {{ $i=0 }}
                    @foreach($pregunta->opciones as $opcion)
                    <x-text-area name="Opcion{{ $i=$i+1 }}" placeholder="Opcion 1" textAreaDev="{{ $opcion->opcion }}"/>
                    @endforeach
                    
                </div>
</x-formSeg>

            <x-button-seg name="Regresar" ruta="seguimiento.index"/>

 </div>
</div>
</x-app-layout>