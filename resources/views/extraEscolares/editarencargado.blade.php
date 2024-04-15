<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Editar') }}
        </h2>
    </x-slot>
   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-10 text-gray-100">
            <form action="{{route('encargado.editform')}}">
                @foreach($encargados as $encargado)
                <input type="text" value="{{$encargado->id}}" style="display: none" name="id">
                <label for="">Nombre:</label>
                <x-text-area name="name" Placeholder="{{$encargado->name}}" textAreaDev="{{$encargado->name}}"/>
                    <br>
                    <label for="">Correo:</label>
                <x-text-area name="email" Placeholder="{{$encargado->email}}" textAreaDev="{{$encargado->email}}"/>
                    <br>
                    <label for="">Curp:</label>
                <x-text-area name="curp" Placeholder="{{$encargado->curp}}" textAreaDev="{{$encargado->curp}}"/>
                <br>
                <label for="">Numero de seguro social:</label>
                <x-text-area name="nss" Placeholder="{{$encargado->nss}}" textAreaDev="{{$encargado->nss}}"/>
                    <br>
            <button type="submit" class="mt-4 bg-green-900 text-white hover:bg-green-700 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Editar
            </button>
            @endforeach
        </form>
        </div>
    </div>
        </div>
    </div>
</x-app-layout>