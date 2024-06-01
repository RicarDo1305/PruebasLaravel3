<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Alumnos') }}
        </h2>
    </x-slot>
<br>
<br>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="pt-5">
        <form action="{{route('extraEscolares.alumnos')}}" method="get">
                <input type="search" name="search" value="{{$texto}}" class="w-full">
                <button type="submit" class="mt-4 bg-green-900 text-white hover:bg-green-700 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150">Buscar</button>
        </form>
    </div>
    <br>
</div>
</div>
<div class="max-w-7xl mx-auto overflow-scroll">
    <table class="">
        <thead>
        <tr class="bg-green-900 text-white">
            <th class="px-4 py-2 border border-gray-400">NoControl</th>
            <th class="px-4 py-2 border border-gray-400">Historial</th>
            <th class="px-4 py-2 border border-gray-400">Nombre</th>
            <th class="px-4 py-2 border border-gray-400">Apellido paterno</th>
            <th class="px-4 py-2 border border-gray-400">Apellido materno</th>
            <th class="px-4 py-2 border border-gray-400">Sexo</th>
            <th class="px-4 py-2 border border-gray-400">Carrera</th>
            <th class="px-4 py-2 border border-gray-400">Semestre</th>
            <th class="px-4 py-2 border border-gray-400">Fecha de ingreso</th>
            <th class="px-4 py-2 border border-gray-400">Tipo de sangre</th>
            <th class="px-4 py-2 border border-gray-400">Nss</th>
            <th class="px-4 py-2 border border-gray-400">Curp</th>
            <th class="px-4 py-2 border border-gray-400">Correo</th>
            <th class="px-4 py-2 border border-gray-400">Nombre del tutor</th>
            <th class="px-4 py-2 border border-gray-400">Telefono del tutor</th>
            <th class="px-4 py-2 border border-gray-400">Padecimiento</th>
            <th class="px-4 py-2 border border-gray-400">Parentesco</th>
            <th class="px-4 py-2 border border-gray-400">Telefono particular</th>
            <th class="px-4 py-2 border border-gray-400">Estatura</th>
            <th class="px-4 py-2 border border-gray-400">Peso</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alumnos as $alumno)
        <tr class="bg-white">
            <td class="px-4 py-2 border border-gray-400">{{$alumno->noControl}}</td>
            <td class="px-4 py-2 border border-gray-400"><button type="submit" class="mt-4 bg-gray-900 text-white hover:bg-gray-700 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150">
                <a href="{{route('alumnos.historial',$alumno->noControl)}}">Historial</a></button></td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->name}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->apaterno}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->amaterno}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->sexo}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->carrera}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->semestre}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->fechaingreso}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->tiposangre}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->nss}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->curp}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->email}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->nombretutor}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->telefonotutor}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->padecimiento}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->parentesco}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->telefonoparticular}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->estatura}}</td>
            <td class="px-4 py-2 border border-gray-400">{{$alumno->peso}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>