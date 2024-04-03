<x-formSeg route="{{ $ruta }}" pregunta="{{ $pregunta->id }}" nameButton="Enviar" method="PUT">
    <div class="space-y-2">
            <x-text-area name="Pregunta" placeholder="Pregunta" textAreaDev="{{ $pregunta->pregunta }}"/>
            <p class="hidden">{{ $i=0 }}</p>
            @foreach($pregunta->opciones as $opcion)
            <x-text-area name="Opcion{{ $i=$i+1  }}" placeholder="Opcion 1" textAreaDev="{{ $opcion->opcion }}"/>
            @endforeach
    </div>
</x-formSeg>