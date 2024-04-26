<x-app-layout>

   <x-header-seg hidden="hidden" titulo="Seguimiento a egresados" />

   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

         <div class="ml-2">
            <x-button-seg name="Inicio" ruta="dashboard" />
         </div>

         <h2 class="mt-3 -mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
            Encuesta a egresados
         </h2>

         <form id="miFormulario" action="{{ route('seguimiento.responder.encuesta.store') }}" method="POST">
            @csrf
            <div id="errores" class="text-white bg-red-700 mt-4 rounded-md text-center
    max-w-7xl mx-auto sm:px-6 lg:px-8"></div>

            <div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y
            divide-gray-900  m-2">

               @foreach($preguntas as $Pregunta)
               <div class="p-6 flex space-x-1 md:space-x-2" id="tarjetaPregunta_{{$Pregunta->id}}">
                  <svg class="h-4 w-4 md:h-6 md:w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                  </svg>
                  <div class="flex-1">
                     <p class="mt-0 text-sm md:text-lg text-gray-100">{{ $Pregunta->pregunta }}</p>
                     <x-input-error class="mt-2" :messages="$errors->get('pregunta_')" />
                     <div class="flex space-x-5">
                        @foreach($Pregunta->opciones as $opcion)
                        <div class="mt-4">
                           <input type="hidden" name="pregunta_{{$Pregunta->id}}" value="{{ $Pregunta->id }}">
                           <input type="radio" id="opcion_{{ $opcion->id }}" name="opcion_{{$Pregunta->id}}" data-pregunta-id="{{ $Pregunta->id }}" value="{{ $opcion->id }}">
                           <label for="{{ $opcion->id }}" class="text-xs md:text-lg text-gray-100">{{ $opcion->opcion }}</label>
                        </div>
                        @endforeach
                     </div>
                  </div>
               </div>
               @endforeach

            </div>
            <x-primary-button class="mt-4 ml-2 bg-green-900 text-white hover:bg-green-700">
               Enviar
            </x-primary-button>
         </form>
      </div>
   </div>

   @vite('resources/js/validarform.js')
</x-app-layout>