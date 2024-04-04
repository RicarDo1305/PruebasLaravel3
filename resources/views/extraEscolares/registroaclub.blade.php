<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>
    <x-formSeg route="registroaclub.store" chirp="" nameButton="Registrarme" method="" enctype="multipart/form-data">
        <div class="space-y-2">
            <label for="">Seleccione su carrera:</label>
            <select name="carrera" class="text-black">
                <option value="ISIC">ISIC</option>
                <option value="IGEM">IGEM</option>
                <option value="IIAL">IIAL</option>
                <option value="INDUSTRIAL">IG</option>
            </select>
            <label for="">Seleccione su semestre:</label>
            <select name="semestre" class="text-black">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
  
            </select>
            <label for="">Seleccione su sexo:</label>
            <select name="sexo" class="text-black">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
            </select>
            <x-text-area name="nss" placeholder="Nss" textAreaDev=""/>
            <label for="">Seleccione un club:</label>
            <select name="club" class="text-black">
            @foreach ($clubs as $club)
                <option class="text-black" name="club" value="{{$club->title}}">{{$club->title}}</option>
            @endforeach
        </select>
        </div>
    </x-formSeg>
</x-app-layout>