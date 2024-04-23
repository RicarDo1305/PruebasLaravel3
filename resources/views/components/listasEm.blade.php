<div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y
            divide-gray-900 m-2">
            @foreach($empleadores as $empleador)
             <div class="p-6 flex space-x-1 md:space-x-2">
                <svg class="h-4 w-4 md:h-6 md:w-6 text-gray-400 -scale-x-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-200">
                                {{ $empleador->name }}
                            </span>
                            <small class="ml-2 text-xs md:text-sm text-gray-400">{{ $empleador->created_at->format('j M Y, g:i a') }}</small>
                            @if($empleador->created_at != $empleador->updated_at)
                            <small class="text-xs md:text-sm text-gray-400"> &middot; {{ __('Edited') }}</small>
                            @endif
                        </div>
                    </div>
                    <p class="mt-4  text-sm md:text-lg text-gray-100">{{ $empleador->ubicacion }}</p>
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
                        <x-dropdown-link :href="route($rutaEdit, $empleador)">
                            {{ __('Edit') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route($rutaDestroy, $empleador) }}">
                            @csrf @method('DELETE')
                            <x-dropdown-link :href="route($rutaDestroy, $empleador)" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Delete') }}
                        </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endforeach
            </div>