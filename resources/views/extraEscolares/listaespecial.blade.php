<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __($id) }}
        </h2>
    </x-slot>
<br>
<br>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="pt-5">
        <form action="{{route('extraEscolares.asistencia',$id)}}" method="get">
                <input type="search" name="search" value="{{$texto}}" class="w-full">
                <button type="submit" class="mt-4 bg-green-900 text-white hover:bg-green-700 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150">Buscar</button>
        </form>
    </div>
    <br>
</div>
</div>
<div class="flex justify-center items-center">
    <table class=" mx-5">
        <thead>
        <tr class="bg-green-900 text-white">
            <th class="px-4 py-2 border border-gray-400">NoControl</th>
            <th class="px-4 py-2 border border-gray-400">Nombre</th>
            <th class="px-4 py-2 border border-gray-400">Carrera</th>
            <th class="px-4 py-2 border border-gray-400">Semestre</th>
            <th class="px-4 py-2 border border-gray-400">Participa</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alumnos as $alumno)
        <tr class="bg-white">
            <td class="px-4 py-2 border border-gray-400">{{$alumno->noControl}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->name}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->carrera}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->semestre}}</td>
            <form action="{{route('descarga.especial',$id)}}" method="GET">
            <td class="px-4 py-2 border border-gray-400"><input type="checkbox"  value="{{$alumno}}" name="name[]"></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <input type="text" value="{{$id}}" style="display: none" name="club">
</div>
<div class="py-12">
    <div class="flex flex-col items-center">
        <x-primary-button class="mt-4 bg-green-900 text-white hover:bg-green-700">
            Crear lista
        </x-primary-button>
    </div>
</div>
    
</x-app-layout>