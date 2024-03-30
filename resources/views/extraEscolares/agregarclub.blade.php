<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-formSeg route="agregarclub" chirp="" nameButton="Crear Club" method="">
                <div class="space-y-2">
                    <input name="img" id="img" type="file" accept=".jpg, .jpeg, .png"/>
                    <x-text-area name="title" placeholder="Titulo" textAreaDev=""/>
                    <x-text-area name="incharge" placeholder="Encargado" textAreaDev=""/>
                    <x-text-area name="description" placeholder="Descripcion" textAreaDev=""/>
                </div>
            </x-formSeg>
        </div>
    </div>
</x-app-layout>