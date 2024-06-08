<x-formSeg route="{{ $ruta }}" chirp="" nameButton="Enviar" method="">
    <div class="space-y-2">
        <x-text-area name="Pregunta" placeholder="Pregunta" textAreaDev="" />
        <x-text-area name="Opcion1" placeholder="Opcion 1" textAreaDev="" />
        <x-text-area name="Opcion2" placeholder="Opcion 2" textAreaDev="" />
        <x-text-area name="Opcion3" placeholder="Opcion 3" textAreaDev="" />
        <x-text-area name="Opcion4" placeholder="Opcion 4" textAreaDev="" />
        <div>
            <label for="carrera">Selecciona una carrera:</label>
            <select class="text-black" name="carrera" id="carrera">
                <option value="General" selected>General</option>
                <option value="ISIC">ISIC</option>
                <option value="IIAL">IIAL</option>
                <option value="IGEM">IGEM</option>
                <option value="IIDN">IIDN</option>
            </select>
        </div>
    </div>
</x-formSeg>