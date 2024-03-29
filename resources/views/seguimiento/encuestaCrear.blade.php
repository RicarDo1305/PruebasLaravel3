<x-app-layout>
<x-header-seg hidden="hidden" titulo="Seguimiento a agresados y empleadores"/>

<h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">
    Crear encuesta
  </h2>

<div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    

 <x-formSeg route="questions.store" chirp="" nameButton="Enviar" method="">
                <div class="space-y-2">
                    <x-text-area name="Pregunta" placeholder="Pregunta" textAreaDev=""/>
                    <textarea class="block w-full rounded-md border-gray-300 @error('Opciones.*'){ border-red-600 }@enderror bg-transparent 
                    shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring
                  focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Opciones"
                    name="Opciones[]" id="Opciones" rows="4"></textarea>
                    @error('Opciones.*')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
            </x-formSeg>

            <x-button-seg name="Regresar" ruta="seguimiento.index"/>

 </div>
</div>
</x-app-layout>
