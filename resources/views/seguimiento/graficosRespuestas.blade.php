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

   <div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y divide-gray-900 m-2">
    <div>
        @foreach($preguntas as $pregunta)
        <table id="tabla_{{ $pregunta->id }}" class="min-w-full divide-y divide-gray-200 mb-4">
             <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pregunta</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Opción</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Respuestas</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
    @foreach($pregunta->opciones as $index => $opcion)
        <tr class="bg-white">
            @if($loop->first)
                <td class="px-6 py-4 whitespace-nowrap" rowspan="{{ count($pregunta->opciones) }}">
                    {{ $pregunta->pregunta }}
                </td>
            @else
            <td class="hidden px-6 py-4 whitespace-nowrap" rowspan="{{ count($pregunta->opciones) }}">
            </td>
            @endif
            <td class="px-6 py-4 whitespace-nowrap">{{ $opcion->opcion }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                @php $noRes = 0; @endphp
                @foreach($respuestas as $respuesta)
                    @if($respuesta->opcion_id == $opcion->id)
                        @php $noRes++; @endphp
                    @endif
                @endforeach
                {{ $noRes }}
            </td>
        </tr>
          @endforeach
       </tbody>

        </table>
        @endforeach
    </div>
</div>

            @foreach($preguntas as $Pregunta)
            <div class="max-w-md mx-auto border border-gray-400 rounded-t-md rounded-b-lg mt-4">
               <canvas id="grafico_{{$Pregunta->id}}" class="grafico canvas-estilo"></canvas>
            </div>
            @endforeach
        </div>

@vite('resources/js/crearGrafico.js')

</x-app-layout>