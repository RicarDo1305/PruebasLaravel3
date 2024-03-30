<x-app-layout>
<x-header-seg hidden="hidden" titulo="Seguimiento a agresados y empleadores"/>

<h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">
    Crear encuesta para empleadores
  </h2>

<div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    

 <x-formSeg route="questionsEm.store" chirp="" nameButton="Enviar" method="">
                <div class="space-y-2">
                    <x-text-area name="Pregunta" placeholder="Pregunta" textAreaDev=""/>
                    <x-text-area name="Opcion1" placeholder="Opcion 1" textAreaDev=""/>
                    <x-text-area name="Opcion2" placeholder="Opcion 2" textAreaDev=""/>
                    <x-text-area name="Opcion3" placeholder="Opcion 3" textAreaDev=""/>
                    <x-text-area name="Opcion4" placeholder="Opcion 4" textAreaDev=""/>
                </div>
            </x-formSeg>

            <x-button-seg name="Regresar" ruta="seguimiento.index"/>

 </div>
</div>
</x-app-layout>
