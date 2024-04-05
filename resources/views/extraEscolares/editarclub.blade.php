<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Editar') }}
        </h2>
    </x-slot>
    <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-10 text-gray-100">
            @foreach($clubs as $club)
            <form action="{{route('club.editform', $club->id)}}" method="POST">
                @endforeach
                @csrf
                @method("PUT")
                <label for="">Seleccione un club:</label>
                <select name="id" class="text-black">
                    @foreach($clubs as $club)
                    <option class="text-black" name="id" value="{{$club->id}}">{{$club->title}}</option>
                    @endforeach
            </select>
            
            <br>
            <br>
            <x-text-area name="img" placeholder="Url de imagen: " textAreaDev=""/>
            <br>
            <label for="">Seleccione un encargado:</label>
                <select name="incharge" class="text-black">
                @foreach ($encargados as $encargado)
                    <option class="text-black" name="club" value="{{$encargado->name}}">{{$encargado->name}}</option>
                @endforeach
            </select>
            <br>
            <br>
            <x-text-area name="description" Placeholder="" textAreaDev=""/>
            <button type="submit" class="mt-4 bg-green-900 text-white hover:bg-green-700 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Editar
            </button>
        </form>
        </div>
    </div>
</x-app-layout>