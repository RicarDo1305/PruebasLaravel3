<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Alumnos') }}
        </h2>
    </x-slot>

    <div>
        <form action="{{route('extraEscolares.alumnos')}}" method="get">
            <div>
                <input type="search" name="search" value="{{$texto}}">
            </div>
            <div>
                <input type="submit" value="Buscar"  class="bg-white">
            </div>
        </form>
    </div>

    <table class="text-white">
        <tr>
            <td>NoControl</td>
            <td>Nombre</td>
        </tr>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{$alumno->noControl}}</td>
            <td>{{$alumno->name}}</td>
        </tr>
        @endforeach
    </table>
</x-app-layout>