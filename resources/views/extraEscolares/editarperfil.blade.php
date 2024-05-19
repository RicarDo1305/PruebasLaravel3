<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Actualizar datos') }}
        </h2>
    </x-slot>
    <x-formSeg route="update.info" chirp="" nameButton="Actualizar" method="" enctype="multipart/form-data">
        <div class="space-y-2">
            <label for="">Seleccione su carrera:</label>
            <select name="carrera" class="text-black">
                <option value="{{Auth::user()->carrera}}">...</option>
                <option value="ISIC">ISIC</option>
                <option value="IGEM">IGEM</option>
                <option value="IIAL">IIAL</option>
                <option value="IIND">IIND</option>
            </select>
            <label for="">Carrera actual: {{Auth::user()->carrera}}</label>
            <br>
            <label for="">Telefono particular:</label>
            <x-text-area name="telefonoparticular" placeholder="" textAreaDev="{{Auth::user()->telefonoparticular}}"/>
            <label for="">Estatura:</label>
            <x-text-area name="estatura" placeholder="Estatura" textAreaDev="{{Auth::user()->estatura}}"/>
            <label for="">Peso:</label>
            <x-text-area name="peso" placeholder="Peso" textAreaDev="{{Auth::user()->peso}}"/>
                <label for="">Padecimientos o alergias:</label>
            <x-text-area name="padecimiento" placeholder="Padecimientos o alergias" textAreaDev="{{Auth::user()->padecimiento}}"/>
                <label for="">Nombre del tutor:</label>
            <x-text-area name="nombretutor" placeholder="Nombre del tutor" textAreaDev="{{Auth::user()->nombretutor}}"/>
                <label for="">Parentesco:</label>
            <x-text-area name="parentesco" placeholder="Parentesco" textAreaDev="{{Auth::user()->parentesco}}"/>
                <label for="">Telefono del tutor:</label>
            <x-text-area name="telefonotutor" placeholder="Telefono del tutor" textAreaDev="{{Auth::user()->telefonotutor}}"/>
        </div>
        <x-button-seg name="Regresar" ruta="{{'extraEscolares.index'}}"/>
                        &nbsp;
    </x-formSeg>
</x-app-layout>