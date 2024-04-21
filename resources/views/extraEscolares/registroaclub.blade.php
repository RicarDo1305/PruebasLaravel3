<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>
    <x-formSeg route="registroaclub.store" chirp="" nameButton="Registrarme" method="" enctype="multipart/form-data">
        <div class="space-y-2">
            <label>Club: </label>
            <textarea name="club" readonly="readonly" placeholder="{{$id}}" class="block w-full rounded-md border-gray-300 bg-transparent 
            shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring
           focus:ring-indigo-200 focus:ring-opacity-50 w-5 h-12 md:w-full md:h-full text-sm md:text-base">{{$id}}</textarea>
            <label for="">Seleccione su carrera:</label>
            <select name="carrera" class="text-black">
                <option value="ISIC">ISIC</option>
                <option value="IGEM">IGEM</option>
                <option value="IIAL">IIAL</option>
                <option value="INDUSTRIAL">IIND</option>
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
            <x-text-area name="fechaingreso" placeholder="Fecha de ingreso al Tec" textAreaDev=""/>
            <x-text-area name="tiposangre" placeholder="Tipo de sangre" textAreaDev=""/>
            <x-text-area name="curp" placeholder="CURP" textAreaDev=""/>
            <x-text-area name="nss" placeholder="Nss" textAreaDev=""/>
            <x-text-area name="telefonoparticular" placeholder="Telefono particular" textAreaDev=""/>
            <x-text-area name="estatura" placeholder="Estatura" textAreaDev=""/>
            <x-text-area name="peso" placeholder="Peso" textAreaDev=""/>
            <x-text-area name="padecimiento" placeholder="Padecimientos o alergias" textAreaDev=""/>
            <x-text-area name="nombretutor" placeholder="Nombre del tutor" textAreaDev=""/>
            <x-text-area name="parentesco" placeholder="Parentesco" textAreaDev=""/>
            <x-text-area name="telefonotutor" placeholder="Telefono del tutor" textAreaDev=""/>
        </div>
        <x-button-seg name="Regresar" ruta="{{'extraEscolares.index'}}"/>
                        &nbsp;
    </x-formSeg>
</x-app-layout>