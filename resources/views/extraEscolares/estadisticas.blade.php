<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            Estadisticas
        </h2>
    </x-slot>
    @php
        $porcentaje=$uclub*100/$usuarios;
    @endphp
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-white">
            <br>
            <label for="">Alumnos totales: {{$ustota}}</label>
            &nbsp;
            <label for="">Alumnos inscritos en algun club: {{$uclub}} ({{$porcentaje}}%)</label>
            <br>
            <br>
            <form action="{{route('extraEscolares.estadistica')}}">
                <label for="">Carrera: </label>
                <select class="text-black" name="carrera" id="">
                    <option selected value="">Todas</option>
                    <option value="ISIC">ISIC</option>
                    <option value="IIAL">IIAL</option>
                    <option value="IGEM">IGEM</option>
                    <option value="IIDN">IIND</option>
                </select>
                @if (empty($opcion)==true)
                <label for="">Carrera seleccionada: Todas //</label>
                @else
                <label for="">Carrera seleccionada: {{$opcion}} //</label>
                @endif
                <label for="">Alumnos totales de la carrera: {{$usuarios}}</label>
                <br>
                <x-primary-button class="mt-4 bg-green-900 text-white hover:bg-green-700">
                    Filtrar
                </x-primary-button>
            </form>
            <br>
    </div>
    </div>
</x-app-layout>