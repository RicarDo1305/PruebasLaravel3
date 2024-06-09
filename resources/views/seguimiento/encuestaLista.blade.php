<x-app-layout>
  <x-header-seg hidden="hidden" titulo="Egresados y empleadores" />

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

     <div>

      <div class="ml-2">
        <x-button-seg name="Regresar" ruta="seguimiento.index" />
      </div>

      <x-seleccion-encuesta ruta="seguimiento.encuesta.filtro.show" />

      <h2 class="mt-3 -mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
        Encuesta Egresados ({{$carrera}})
      </h2>

      <x-encuesta-lista rutaEdit="seguimiento.encuesta.edit" rutaDestroy="seguimiento.encuesta.destroy" :preguntas=$preguntas />

    </div>
  </div>
</x-app-layout>