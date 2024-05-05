<div class="mt-2 md:mt-4 ml-4">
        <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route($rutaLista) }}">
                          Lista
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route($rutaEncuesta) }}">
                          Crear encuesta
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route($rutaEncuestaLista) }}">
                          Ver encuesta
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route($rutaRespuestas) }}">
                          Ver respuestas
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route($rutaSubirReporte) }}">
                          Subir reporte
                        </x-dropdown-link>
                    </x-slot>
        </x-dropdown>
    </div>