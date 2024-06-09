<x-formSeg route="{{ $ruta }}" pregunta="{{ $pregunta->id }}" nameButton="Enviar" method="PUT">
    <div class="space-y-2">
            <x-text-area name="Pregunta" placeholder="Pregunta" textAreaDev="{{ $pregunta->pregunta }}"/>
            <p class="hidden">{{ $i=0 }}</p>
            @foreach($pregunta->opciones as $opcion)
            <x-text-area name="Opcion{{ $i=$i+1  }}" placeholder="Opcion 1" textAreaDev="{{ $opcion->opcion }}"/>
            @endforeach
            <div class="{{$hidden}}">
            <label for="carrera">Selecciona una carrera:</label>
            <select class="text-black" name="carrera" id="carrera">
                <option value="General" {{ $pregunta->carrera === 'General' ? 'selected' : ''}} >General</option>
                <option value="ISIC" {{ $pregunta->carrera === 'ISIC' ? 'selected' : ''}}>ISIC</option>
                <option value="IIAL" {{ $pregunta->carrera === 'IIAL' ? 'selected' : ''}}>IIAL</option>
                <option value="IGEM" {{ $pregunta->carrera === 'IGEM' ? 'selected' : ''}}>IGEM</option>
                <option value="IIDN" {{ $pregunta->carrera === 'IIDN' ? 'selected' : ''}}>IIDN</option>
            </select>
        </div>
    </div>
</x-formSeg>