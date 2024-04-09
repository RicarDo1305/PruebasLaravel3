<x-app-layout>
<x-header-seg hidden="hidden" titulo="Egresados y empleadores"/>

<h2 class="mt-3 -mb-8 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
    Editar pregunta
</h2>

<div class="py-12">
  <div class="max-w-7xl mx-auto px-4 md:px-8">
    
       <x-editar-encuesta ruta="seguimiento.encuesta.update" :pregunta=$pregunta/>

      <div class="ml-2 md:ml-0">
       <x-button-seg name="Regresar" ruta="seguimiento.encuesta.show"/>
      </div>
  </div>
</div>
</x-app-layout>