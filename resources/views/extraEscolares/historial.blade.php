<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Historial
        </h2>
        <br>
        @can('clubs')
        <x-button-seg name="Regresar" ruta="{{'dashboard'}}"/>
        <div class="flex justify-center items-center">
            <table class="">
                <thead>
                <tr class="bg-green-900 text-white">
                    <th class="px-4 py-2 border border-gray-400">NoControl</th>
                    <th class="px-4 py-2 border border-gray-400">Nombre</th>
                    <th class="px-4 py-2 border border-gray-400">Carrera</th>
                    <th class="px-4 py-2 border border-gray-400">Semestre</th>
                    <th class="px-4 py-2 border border-gray-400">Club</th>
                    <th class="px-4 py-2 border border-gray-400">Horas liberadas</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historial as $alumno)
                <tr class="bg-white">
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->noControl}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->name}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->carrera}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->semestre}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->club}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->horas}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <label class="font-semibold text-xl text-gray-200 leading-tight">Horas totales: {{$horasff}}</label>
        </div>
        @endcan

        @can('see-extraescolares')
        <x-button-seg name="Regresar" ruta="{{'extraEscolares.alumnos'}}"/>
        <div class="flex justify-center items-center">
            <table class="">
                <thead>
                <tr class="bg-green-900 text-white">
                    <th class="px-4 py-2 border border-gray-400">NoControl</th>
                    <th class="px-4 py-2 border border-gray-400">Nombre</th>
                    <th class="px-4 py-2 border border-gray-400">Carrera</th>
                    <th class="px-4 py-2 border border-gray-400">Semestre</th>
                    <th class="px-4 py-2 border border-gray-400">Club</th>
                    <th class="px-4 py-2 border border-gray-400">Horas liberadas</th>
                </tr>
                </thead>
                <tbody>
                @foreach($historial as $alumno)
                <tr class="bg-white">
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->noControl}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->name}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->carrera}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->semestre}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->club}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->horas}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            <label class="font-semibold text-xl text-gray-200 leading-tight">Horas totales: {{$horasff}}</label>
        </div>
        @endcan
    </x-slot>
</x-app-layout>