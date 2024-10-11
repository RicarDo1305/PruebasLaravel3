<x-app-layout>
    <x-header-seg hidden="hidden" titulo="Egresados y empleadores" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="ml-2">
                <x-button-seg name="Regresar" ruta="seguimiento.index" />
            </div>

            <h2 class="mt-3 -mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
                Lista de egresados ({{$carrera}})
            </h2>
            <h2 class="mt-5 md:mt-3 -mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
                Total de egresados: ({{$noEgresados}})
            </h2>

            <div class="mt-5">
                <x-seleccion-encuesta ruta="seguimiento.lista.filtro.show" carrera={{$carrera}}/>
            </div>

            <x-listasEg :egresados=$egresados rutaEdit="seguimiento.lista.edit" rutaDestroy="seguimiento.lista.destroy" />

        </div>
    </div>

     @vite('resources/js/ventanaEmergente.js')
</x-app-layout>