<x-app-layout>
  <x-header-seg hidden="hidden" titulo="Egresados y empleadores" />

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

      <div class="ml-2">
        <x-button-seg name="Regresar" ruta="seguimiento.index" />
      </div>

      <h2 class="mt-3 -mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
        Encuesta Empleadores
      </h2>

      <x-encuesta-lista rutaEdit="seguimiento.encuestaEm.edit" rutaDestroy="seguimiento.encuestaEm.destroy" :preguntas=$preguntas />

    </div>
  </div>
</x-app-layout>