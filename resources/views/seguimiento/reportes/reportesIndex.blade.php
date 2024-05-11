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
                            <label for="documento">Selecciona un documento (Word o PDF):</label><br>
                            <input type="file" id="reporte" name="reporte" accept=".doc, .docx, .pdf">
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

            <div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y
            divide-gray-900 m-2">
                @foreach($reportes as $reporte)
                <div class="p-6 flex space-x-1 md:space-x-2">
                    <svg class="h-4 w-4 md:h-6 md:w-6 text-gray-400 -scale-x-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
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
                                    <form method="POST" action="{{ route('reportes.destroy', $reporte) }}">
                                        @csrf @method('DELETE')
                                        <x-dropdown-link :href="route('reportes.destroy', $reporte)" onclick="event.preventDefault();
                            this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>