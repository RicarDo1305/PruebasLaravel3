<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Encargados') }}
        </h2>
    </x-slot>
<br>
<br>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="pt-5">
        <form action="{{route('extraEscolares.encargados')}}" method="get">
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
            <th class="px-4 py-2 border border-gray-400">Curp</th>
            <th class="px-4 py-2 border border-gray-400">Nss</th>
            <th class="px-4 py-2 border border-gray-400">Editar</th>
            <th class="px-4 py-2 border border-gray-400">Eliminar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alumnos as $alumno)
        <tr class="bg-white">
            <td class="px-4 py-2 border border-gray-400">{{$alumno->noControl}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->name}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->carrera}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->nss}}</td>
            <td class="px-4 py-2 border border-gray-400"><x-primary-button class="mt-4 bg-yellow-500 text-white hover:bg-yellow-400">
                <a href="{{route('encargado.editar',$alumno->id)}}">Editar</a>
                </x-primary-button></td>
            <td class="px-4 py-2 border border-gray-400"><x-primary-button class="mt-4 bg-red-500 text-white hover:bg-red-400">
                <a href="{{route('encargado.eliminar',$alumno->id)}}">Eliminar</a>
                </x-primary-button></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>