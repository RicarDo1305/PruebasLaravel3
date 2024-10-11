<x-app-layout>

    <x-header-seg hidden="hidden" titulo="Reportes" />

    <h2 class="mt-3 -mb-10 md:-mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
        Subir reporte
    </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm p-0 m-2 rounded-lg sm:rounded-lg sm:m-0">
                <div class="p-10 text-gray-100">
                    <form action="{{ route('reportes.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label class="text-sm md:text-lg" for="documento">Selecciona un documento (Word o PDF):</label><br>
                            <input class="text-xs md:text-lg w-full" type="file" id="reporte" name="reporte" accept=".doc, .docx, .pdf">
                            <x-input-error class="mt-2" :messages="$errors->get('reporte')" />
                        </div>
                        <x-primary-button class="mt-4 bg-green-900 text-white hover:bg-green-700">
                            {{ __('Enviar') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>


            <h2 class="mt-3 -mb-10 md:-mb-4 text-center font-semibold text-sm md:text-lg text-gray-200 leading-tight">
                Reportes
            </h2>

            <div class="mt-12 md:mt-6 bg-slate-800 shadow-sm rounded-lg divide-y
            divide-gray-900 m-2">
                @foreach($reportes as $reporte)
                <div class="p-6 flex space-x-1 md:space-x-2">
                    <svg class="h-4 w-4 md:h-6 md:w-6 text-gray-400 -scale-x-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                    </svg>

                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-200 text-sm md:text-lg">
                                    {{ $reporte->reporte }}
                                </span>
                                <small class="ml-2 text-xs md:text-sm text-gray-400">{{ $reporte->created_at->format('j M Y, g:i a') }}</small>
                            </div>
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <form method="POST" action="{{ route('reportes.descargar', $reporte) }}">
                                        @csrf
                                        <x-dropdown-link :href="route('reportes.descargar', $reporte)" onclick="event.preventDefault();
                            this.closest('form').submit();">
                                            {{ __('Descargar') }}
                                        </x-dropdown-link>
                                    </form>
                                    <div class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-300 hover:bg-gray-800 focus:outline-none focus:bg-gray-800 transition duration-150 ease-in-out">
                                        <div>
                                            <button id="boton-borrar" class="block w-full text-start text-sm leading-5 text-gray-300 hover:bg-gray-800 hover:text-white focus:outline-none focus:bg-gray-800 transition duration-150 ease-in-out" onclick="openModal()">
                                                {{ __('Delete') }}
                                            </button>
                                        </div>
                                    </div>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
                <x-comprobar-eliminacion rutaEliminar="reportes.destroy" :tipo=$reporte />
                @endforeach
            </div>
        </div>
    </div>

    <script>
    // Mostrar el modal
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    // Cerrar el modal
    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        resetModal();
    }

    // Resetear los valores dentro del modal
    function resetModal() {
        // Aquí puedes restaurar cualquier estado o valor al original si es necesario
        document.getElementById('password').value = '';
    }

    // Evento para cerrar el modal cuando se hace clic en el botón "Cancelar"
    document.getElementById('cancelar').addEventListener('click', function(event) {
        event.preventDefault();
        closeModal();
    });

    // Evento para manejar el cierre del modal y restaurar los estados
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") { // Cerrar con la tecla "Escape"
            closeModal();
        }
    });

    // Opcional: si necesitas revertir otros cambios cuando se cierre el modal, añade más lógica dentro de `resetModal`.
</script>

</x-app-layout>