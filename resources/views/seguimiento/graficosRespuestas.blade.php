<x-app-layout>

    <x-header-seg hidden="hidden" titulo="Seguimiento a egresados" />


    @if(session('error'))
    <div class="bg-red-800 text-red-200 text-center text-sm md:text-lg font-bold p-1 md:p-2">{{ session('error') }}</div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="ml-2">
                <x-button-seg name="Regresar" ruta="seguimiento.index" />
                <div>
                    @csrf @method('DELETE')
                    <x-primary-button id="boton-borrar" class="mt-4 bg-red-600 text-white hover:bg-red-800">
                        {{ __('Borrar todas las respuestas') }}
                    </x-primary-button>
                </div>
                <div id="modal" class="fixed inset-0 z-10 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="fixed inset-0 bg-black opacity-50"></div>
                        <div class="relative bg-slate-800 rounded-lg p-8 max-w-md">
                            <h2 class="text-sm md:text-lg mb-4 text-white">¿Estás seguro que deseas borrar todas las respuestas?</h2>
                            <h3 class="text-sm md:text-lg mb-4 text-white">Esto solo se debe hacer cuando ya esten completos todos los informes</h3>
                            <form id="formEliminar" method="POST" action="{{ route($rutaEliminar, $tipo) }}">
                                @csrf
                                @method('DELETE')
                                <div class="mb-4">
                                    <label for="password" class="text-white text-sm md:text-lg">Contraseña:</label>
                                    <input type="password" id="password" name="password" class="text-sm md:text-lg block w-full px-4 py-2 mt-1 bg-gray-700 text-white rounded-md focus:outline-none focus:ring focus:ring-indigo-400" required>
                                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                                </div>
                                <div class="flex justify-end">
                                    <button id="cancelar" class="text-sm md:text-lg text-gray-500 hover:text-gray-700 mr-4">Cancelar</button>
                                    <x-primary-button class="text-sm md:text-lg bg-red-600 text-white hover:bg-red-800">
                                        {{ __('Borrar') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <h2 class="mt-3 -mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
                {{ $titulo }}
            </h2>

            <div class="mt-5 {{$Hidden}}">
                <x-seleccion-encuesta ruta="seguimiento.respuestasEg.filtro.show" carrera={{$carrera}} />
            </div>
            <div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y divide-gray-900 m-2 overflow-x-auto">
                <div class="m-4">
                    @foreach($preguntas as $pregunta)
                    <table id="tabla_{{ $pregunta->id }}" class="graficos min-w-full divide-y divide-gray-200 mb-4">
                        <thead class="bg-gray-50">
                            <tr class="bg-green-900 text-white">
                                <th scope="col" class="px-1 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-white uppercase tracking-wider border border-gray-400">Pregunta</th>
                                <th scope="col" class="px-1 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-white uppercase tracking-wider border border-gray-400">Opción</th>
                                <th scope="col" class="px-1 py-1 md:px-6 md:py-3 text-left text-xs font-medium text-white uppercase tracking-wider border border-gray-400">Respuestas</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($pregunta->opciones as $index => $opcion)
                            <tr class="bg-white">
                                @if($loop->first)
                                <td class="px-6 py-4 text-xs md:text-base whitespace-normal md:whitespace-nowrap border border-gray-400" rowspan="{{ count($pregunta->opciones) }}">
                                    {{ $pregunta->pregunta }}
                                </td>
                                @else
                                <td class="hidden px-6 py-4 whitespace-nowrap border border-gray-400" rowspan="{{ count($pregunta->opciones) }}">
                                </td>
                                @endif
                                <td class="px-2 py-1 md:px-6 md:py-4 text-xs md:text-base text-center md:text-left whitespace-normal md:whitespace-nowrap border border-gray-400">{{ $opcion->opcion }}</td>
                                <td class="px-2 py-1 md:px-6 md:py-4 text-xs md:text-base text-center md:text-left whitespace-normal md:whitespace-nowrap border border-gray-400">
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
                    <div class="p-2">
                        <div class="max-w-md mx-auto border border-gray-400 rounded-t-md rounded-b-lg mt-4 p-1">
                            <canvas id="grafico_{{$pregunta->id}}" class="grafico canvas-estilo"></canvas>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>


        </div>
    </div>

    @vite('resources/js/crearGrafico.js')
    @vite('resources/js/ventanaEmergente.js')

</x-app-layout>