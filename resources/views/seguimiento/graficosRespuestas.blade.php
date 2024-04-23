<x-app-layout>

      <x-header-seg hidden="hidden" titulo="Seguimiento a egresados"/>
      
<div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
   <div class="ml-2">
   <x-button-seg name="Regresar" ruta="seguimiento.index"/>
   </div> 

   <h2 class="mt-3 -mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
    {{ $titulo }}
   </h2>

   <div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y
            divide-gray-900  m-2">
          
            @foreach($preguntas as $Pregunta)
             <div class="p-6 flex space-x-1 md:space-x-2" id="tarjetaPregunta_{{$Pregunta->id}}">
             <svg class="h-4 w-4 md:h-6 md:w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
             </svg>

                <div class="flex-1">
                    <p class="mt-0 text-sm md:text-lg text-gray-100">{{ $Pregunta->pregunta }}</p>
                    <x-input-error class="mt-2" :messages="$errors->get('pregunta_')" />
                      <div class="flex space-x-5">
                      @foreach($Pregunta->opciones as $opcion)
                      <div class="mt-4">
                        
                         <label class="text-xs md:text-lg text-gray-100">{{ $opcion->opcion }}</label>
                         @php $noRes = 0; @endphp

                         @foreach($respuestas as $respuesta)
                         @if($respuesta->opcion_id == $opcion->id)
                         @php $noRes++; @endphp
                         @endif
                         @endforeach
                         <p class="respuesta text-white" data-pregunta="{{ $Pregunta->pregunta }}" data-opcion="{{ $opcion->opcion }}" data-res="{{ $noRes }}">{{ $noRes }}</p>
                      </div>
                      @endforeach
                      </div>
                </div>
            </div>
            @endforeach
            <hr>
            @foreach($preguntas as $Pregunta)
            <div class="max-w-4xl mx-auto border border-gray-400 rounded-t-md rounded-b-lg mt-4">
               <canvas id="grafico_{{$Pregunta->id}}" class="grafico canvas-estilo"></canvas>
            </div>
            @endforeach
        </div>

@vite('resources/js/crearGrafico.js')

</x-app-layout>