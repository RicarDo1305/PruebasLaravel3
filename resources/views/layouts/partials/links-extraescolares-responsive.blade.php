@can('see-extraescolares')

<x-responsive-nav-link :href="route('extraEscolares.encargados')" :active="request()->routeIs('extraEscolares.encargados')">
    {{ __('Encargados') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('/extraEscolares/admextraescolares')" :active="request()->routeIs('/extraEscolares/admextraescolares')">
    {{ __('Registrar encargado') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('extraEscolares.index')" :active="request()->routeIs('extraEscolares.index')">
    {{ __('Clubs') }}
</x-responsive-nav-link>
       
<x-responsive-nav-link :href="route('extraEscolares.alumnos')" :active="request()->routeIs('extraEscolares.alumnos')">
    {{ __('Alumnos') }}
</x-responsive-nav-link>
@endcan

@can('see-clubs')
<x-responsive-nav-link :href="route('extraEscolares.index')" :active="request()->routeIs('extraEscolares.index')">
    {{ __('Listas') }}
</x-responsive-nav-link>
@endcan

@can('clubs')
<x-responsive-nav-link :href="route('extraEscolares.index')" :active="request()->routeIs('extraEscolares.*')">
    {{ __('Clubs') }}
</x-responsive-nav-link>
@endcan