<x-app-layout>
    
  <x-header-seg hidden="hidden" titulo="Egresados y empleadores"/>

  

<div class="py-12">
 <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <h2 class="mt-3 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
    Generar muestra
    </h2>

  <x-formSeg route="seguimiento.muestra.store" method="" nameButton="Generar">
      <x-text-area name="poblacion" placeholder="Poblacion" textAreaDev=""/>
  </x-formSeg>

  <div class="ml-2 md:ml-0">
  <x-button-seg name="Regresar" ruta="seguimiento.index"/>
  </div>

<div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y divide-gray-900 m-2">
<div class="p-6 flex space-x-1 md:space-x-2">
                <svg class="h-4 w-4 md:h-6 md:w-6 text-gray-400 -scale-x-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>

                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-200 text-sm md:text-lg">
                                Muestra
                            </span>
                            
                        </div>
                    </div>
                <p class="mt-4 text-sm md:text-lg text-gray-100">Encuestas necesarias: {{ $resultado ?? null }}</p>
            </div>
    </div>
 </div>
</div>
</div> 
</x-app-layout>