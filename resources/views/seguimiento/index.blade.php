<x-app-layout>
    
  <x-header-seg hidden="" titulo="Seguimiento a agresados y empleadores"/>

  <h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">
    Agregar alumno
  </h2>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-formSeg route="seguimiento.store" chirp="" nameButton="Añadir alumno" method="">
                <div class="space-y-2">
                    <x-text-area name="nombre" placeholder="Nombre" textAreaDev=""/>
                    <x-text-area name="carrera" placeholder="Carrera" textAreaDev=""/>
                </div>
            </x-formSeg>
            <div class="flex space-x-5">
            <x-button-seg name="Lista alumnos" ruta="seguimiento.show"/>
            <x-button-seg name="Crear encuesta" ruta="seguimiento.encuesta.index"/>
            <x-button-seg name="Ver encuesta para egresados" ruta="seguimiento.encuesta.show"/>
            </div>
        </div>
        
  </div>
  <h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">
    Agregar empleadores
  </h2>
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-formSeg route="seguimientoEg.store" chirp="" nameButton="Añadir empleador" method="">
                <div class="space-y-2">
                <x-text-area name="nombreEmpresa" placeholder="Nombre de la empresa" textAreaDev=""/>
                <x-text-area name="ubicacion" placeholder="Ubicacion" textAreaDev=""/>
                </div>
            </x-formSeg>
            <div class="flex space-x-5">
            <x-button-seg name="Lista empleadores" ruta="seguimiento.empleadores.show"/>
            <x-button-seg name="Crear encuesta" ruta="seguimiento.encuestaEm.index"/>
            <x-button-seg name="Ver encuesta para empladores" ruta="seguimiento.encuestaEm.show"/>
            </div>
        </div>
        
  </div>
</x-app-layout>