<x-app-layout>
<x-header-seg hidden="hidden" titulo="Egresados y empleadores"/>

<h2 class="mt-3 -mb-10 md:-mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
    Crear encuesta para agresados
</h2>

<div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    

      <x-crear-encuesta ruta="questions.store" />
       
      <div class="ml-2 md:ml-0">
      <x-button-seg name="Regresar" ruta="seguimiento.index"/>
      </div>
 </div>
</div>
</x-app-layout>
