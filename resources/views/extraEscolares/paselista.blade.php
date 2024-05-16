<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __($titulo) }}
        </h2>
    </x-slot>
<br>
<br>
<div class="py-12">
    @foreach ($alumnos as $alumno)
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 overflow-hidden shadow-sm sm:rounded-lg">
        <x-button-seg name="Regresar" ruta="{{'extraEscolares.index'}}"/>
        <button class="ms-3 bg-green-900 text-white hover:bg-green-700 'inline-flex items-center 
        px-1 py-1 md:px-2 md:py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs md:text-xs 
        text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 
        focus:ring-offset-gray-800 transition ease-in-out duration-150'{{ $alumno->name == null ? 'hidden' : '' }}">
        <a href="{{route('extraEscolares.asistencia',$titulo)}}">Pase de lista</a></button>
        <button class="ms-3 bg-green-900 text-white hover:bg-green-700 'inline-flex items-center 
        px-1 py-1 md:px-2 md:py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs md:text-xs 
        text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 
        focus:ring-offset-gray-800 transition ease-in-out duration-150' {{ $alumno->name == null ? 'hidden' : '' }}">
        <a href="{{route('registro.especial',$titulo)}}">Lista especial</a></button>
        &nbsp;
        <x-primary-button class="mt-4 bg-yellow-500 text-white hover:bg-yellow-700 {{ $alumno->name == null ? 'hidden' : '' }}">
            <a href="{{route('descarga2',$titulo)}}" download="">Lista de {{$titulo}}</a>
        </x-primary-button>
    @break;
    @endforeach
    </div>
    
    
    <br>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="pt-5">
        <form action="{{route('extraEscolares.club',$id)}}" method="get">
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
            <th class="px-4 py-2 border border-gray-400">Asistencias</th>
            <th class="px-4 py-2 border border-gray-400">Historial</th>
        </tr>
        </thead>
        <tbody>
        @foreach($alumnos as $alumno)
        @php
        $asistencia =$asistencias->where('name',$alumno->name)->where('club',$titulo)->count();
        $historial= $asistencias->where('name',$alumno->name)->where('club',$titulo);
        @endphp
        <tr class="bg-white">
            <td class="px-4 py-2 border border-gray-400 text-center">{{$alumno->noControl}}</td>
            <td class="px-4 py-2 border border-gray-400 text-center">{{$alumno->name}}</td>
            <td class="px-4 py-2 border border-gray-400 text-center">{{$alumno->carrera}}</td>
            <td class="px-4 py-2 border border-gray-400 text-center">{{$alumno->semestre}}</td>
            <td class="px-4 py-2 border border-gray-400 text-center">{{$asistencia}}</td>
            <td class="px-4 py-2 border border-gray-400 text-center">
                @foreach ($historial as $his)
                @php
                $a=substr($his->created_at, 0, -9);
                @endphp
                {{$a}}
                <br>
             @endforeach
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="py-12">
    
</div>
    
</x-app-layout>