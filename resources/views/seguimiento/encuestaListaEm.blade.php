<x-app-layout>
<x-header-seg hidden="hidden" titulo="Seguimiento a agresados y empleadores"/>

<h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">
    Encuesta Empleadores
</h2>

<div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
  <x-button-seg name="Regresar" ruta="seguimiento.index"/>
 
   <x-encuesta-lista rutaEdit="seguimiento.encuestaEm.edit"
   rutaDestroy="seguimiento.encuestaEm.destroy" :preguntas=$preguntas/>

 </div>
</div>
</x-app-layout>