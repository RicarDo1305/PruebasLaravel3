<x-slot name="header">
        <div class="flex mx-auto items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __($titulo) }}
        </h2>
        <div class="space-x-3">
        <x-primary-button class="{{ $hidden }}">
            <a href="" class="">Crear encuesta</a>
        </x-primary-button>
        <x-primary-button class="{{ $hidden }}">
            <a href="">Generar muestra</a>
        </x-primary-button>
        </div>
        </div>
    </x-slot>