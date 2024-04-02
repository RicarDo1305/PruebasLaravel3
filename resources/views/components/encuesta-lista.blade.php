<div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y
            divide-gray-900">

            @foreach($preguntas as $Pregunta)
             <div class="p-6 flex space-x-2">
             <svg  class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
             <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
             </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <small class="ml-2 text-sm text-gray-400">{{ $Pregunta->created_at->format('j M Y, g:i a') }}</small>
                            @if($Pregunta->created_at != $Pregunta->updated_at)
                            <small class="text-sm text-gray-400"> &middot; {{ __('Edited') }}</small>
                            @endif
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-100">{{ $Pregunta->pregunta }}</p>
                      <div class="flex space-x-5">
                      @foreach($Pregunta->opciones as $opcion)
                         <div>
                         <p class="mt-4 text-lg text-gray-100">{{ $opcion->opcion }}</p>
                         </div>
                      @endforeach
                      </div>
                </div>
                @can('update', $Pregunta)
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route($rutaEdit, $Pregunta)">
                            {{ __('Editar pregunta') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route($rutaDestroy, $Pregunta) }}">
                            @csrf @method('DELETE')
                            <x-dropdown-link :href="route($rutaDestroy, $Pregunta)" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Borrar pregunta') }}
                        </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endcan
            </div>
            @endforeach
            </div>