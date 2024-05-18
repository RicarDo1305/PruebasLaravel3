<x-app-layout>
    <x-header-seg hidden="hidden" titulo="Sistema de gestion de vinculacion" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2 md:p-0">
            <div class="bg-gray-800 overflow-hidden shadow-sm rounded-md sm:rounded-lg">
                <div class="p-6 text-gray-100 text-xs md:text-base">
                    {{ __("Welcome") }} {{ Auth::user()->name }}
                    <br>
                    @can('clubs')
                    @php
                    $horas=Auth::user()->horas;
                    @endphp
                     <label class="text-white" for="">Progreso de horas:</label>
                     <progress max="500" value="{{$horas}}"></progress>
                     {{$horas}} horas liberadas de 250
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-app-layout>