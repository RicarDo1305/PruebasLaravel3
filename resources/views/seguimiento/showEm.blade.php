<x-app-layout>
<x-header-seg hidden="" titulo="Seguimiento a agresados y empleadores"/>

   <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <x-button-seg name="Regresar" ruta="seguimiento.index"/>

    <h2 class="mt-3 -mb-4 text-center font-semibold text-xl text-gray-200 leading-tight">
        Lista de empleadores
    </h2>

     <div class="mt-6 bg-slate-800 shadow-sm rounded-lg divide-y
            divide-gray-900">
            @foreach($chirps as $chirp)
             <div class="p-6 flex space-x-2">
                <svg class="h-6 w-6 text-gray-400 -scale-x-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-200">
                                {{ $chirp->user->name }}
                            </span>
                            <small class="ml-2 text-sm text-gray-400">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                            @if($chirp->created_at != $chirp->updated_at)
                            <small class="text-sm text-gray-400"> &middot; {{ __('Edited') }}</small>
                            @endif
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-100">{{ $chirp->message }}</p>
                </div>
                @can('update', $chirp)
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg class="w-5 h-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('chirps.edit', $chirp)">
                            {{ __('Edit Chirp') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('chirps.destroy', $chirp) }}">
                            @csrf @method('DELETE')
                            <x-dropdown-link :href="route('chirps.destroy', $chirp)" onclick="event.preventDefault();
                            this.closest('form').submit();">
                            {{ __('Delete Chirp') }}
                        </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @endcan
            </div>
            @endforeach
            </div>

    </div>
    </div>
</x-app-layout>