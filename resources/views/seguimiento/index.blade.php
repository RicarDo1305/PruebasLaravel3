<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Seguimiento a agresados y empleadores') }}
        </h2>
    </x-slot>

    <h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">Agregar alumno</h2>

  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-formSeg route="seguimiento.store" chirp="" nameButton="Añadir alumno" method=""/>

        </div>
  </div>
</x-app-layout>