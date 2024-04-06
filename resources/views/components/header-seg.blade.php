<x-slot name="header">
        <div class="flex mx-auto items-center justify-between">
    <h2 class="font-semibold text-gray-200 leading-tight text-sm sm:text-base lg:text-lg">
            {{ __($titulo) }}
        </h2>
        <div class="space-x-3">
        <x-primary-button class="{{ $hidden }} bg-green-900 text-white hover:bg-green-700">
            <a href="{{ route('seguimiento.muestra.show') }}">Generar muestra</a>
        </x-primary-button>
        </div>
        </div>
    </x-slot>