<x-app-layout>
    <x-slot name="header">
        <div class="flex mx-auto items-center justify-between">
        <h2 class="font-semibold text-xl dark:text-gray-200 leading-tight">
            {{ __('Seguimiento a agresados y empleadores') }}
        </h2>
        <div class="space-x-3">
        <x-primary-button class="">
            <a href="" class="">Crear encuesta</a>
        </x-primary-button>
        <x-primary-button class="">
            <a href="">Generar muestra</a>
        </x-primary-button>
        </div>
        </div>
    </x-slot>

  <h2 class="mt-3 -mb-4 text-center font-semibold text-xl dark:text-gray-200 leading-tight">Agregar alumno</h2>

  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-formSeg route="seguimiento.store" chirp="" nameButton="Añadir alumno" method="">
                <div class="space-y-2">
                    <x-text-area name="nombre" placeholder="Nombre" textAreaDev=""/>
                    <x-text-area name="carrera" placeholder="Carrera" textAreaDev=""/>
                </div>
            </x-formSeg>

            <a class="text-sm font-semibold underline border-2 border-transparent rounded
          text-slate-300 focus:border-slate-500 focus:outline-none"  
            href="{{  route('seguimiento.index')  }}">Lista de alumnos</a>

        </div>
        
  </div>
  <h2 class="mt-3 -mb-4 text-center font-semibold text-xl
   dark:text-gray-200 leading-tight">Agregar empleadores</h2>
  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-formSeg route="seguimientoEg.store" chirp="" nameButton="Añadir empleador" method="">
                <div class="space-y-2">
                <x-text-area name="nombreEmpresa" placeholder="Nombre de la empresa" textAreaDev=""/>
                <x-text-area name="ubicacion" placeholder="Ubicacion" textAreaDev=""/>
                </div>
            </x-formSeg>

            <a class="text-sm font-semibold underline border-2 border-transparent rounded
          text-slate-300 focus:border-slate-500 focus:outline-none"  
            href="{{  route('seguimiento.index')  }}">Lista de empleadores</a>

        </div>
        
  </div>
</x-app-layout>