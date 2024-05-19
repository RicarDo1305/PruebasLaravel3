
@can('see-extraescolares')
<div class="hidden sm:flex sm:items-center sm:ms-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-400 bg-gray-800 hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                <div> Encargados</div>

                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('/extraEscolares/admextraescolares')">
                {{ __('Registrar encargado') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('extraEscolares.encargados')">
                {{ __('Encargados') }}
            </x-dropdown-link>
        </x-slot>
    </x-dropdown>
</div>

<div class="hidden sm:flex sm:items-center sm:ms-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-400 bg-gray-800 hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                <div>Clubs</div>

                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('agregarclub')">
                {{ __('Registrar club') }}
            </x-dropdown-link>
            <x-dropdown-link :href="route('extraEscolares.index')">
                {{ __('Clubs') }}
            </x-dropdown-link>
        </x-slot>
    </x-dropdown>
</div>
<x-nav-link :href="route('extraEscolares.alumnos')" :active="request()->routeIs('extraEscolares.alumnos')">
    {{ __('Alumnos') }}
</x-nav-link>
@endcan

@can('see-clubs')
<x-nav-link :href="route('extraEscolares.index')" :active="request()->routeIs('extraEscolares.index')">
    {{ __('Listas') }}
</x-nav-link>
@endcan

@can('clubs')
<x-nav-link :href="route('extraEscolares.index')" :active="request()->routeIs('extraEscolares.*')">
    {{ __('Clubs') }}
</x-nav-link>
<x-nav-link :href="route('edit.info')" :active="request()->routeIs('edit.info')">
    {{ __('Editar informacion') }}
</x-nav-link>
@endcan