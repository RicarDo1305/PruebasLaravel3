<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-formSeg route="agregarclub.store" chirp="" nameButton="Crear Club" method="">
                <div class="space-y-2">
                    <label for="img">Imagen:</label>
                    <input type="file" name="img">
                    <x-text-area name="title" placeholder="Titulo" textAreaDev=""/>
                    <label for="">Seleccione un encargado:</label>
                    <select name="incharge" class="text-black">
                    @foreach ($encargados as $encargado)
                        <option class="text-black" name="incharge" value="{{$encargado->name}}">{{$encargado->name}}</option>
                    @endforeach
                </select>
                    <x-text-area name="description" placeholder="Descripcion" textAreaDev=""/>
                </div>
            </x-formSeg>
        </div>
    </div>
</x-app-layout>