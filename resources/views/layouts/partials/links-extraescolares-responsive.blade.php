@can('see-extraescolares')

<x-responsive-nav-link :href="route('/extraEscolares/admextraescolares')" :active="request()->routeIs('dashboard')">
    {{ __('Registrar encargado') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('agregarclub')" :active="request()->routeIs('dashboard')">
    {{ __('Registrar club') }}
</x-responsive-nav-link>

<x-responsive-nav-link :href="route('club.editar')" :active="request()->routeIs('dashboard')">
    {{ __('Editar club') }}
</x-responsive-nav-link>
       
<x-responsive-nav-link :href="route('extraEscolares.alumnos')" :active="request()->routeIs('extraEscolares.*')">
    {{ __('Alumnos') }}
</x-responsive-nav-link>
@endcan

@can('see-clubs')
<x-responsive-nav-link :href="route('/extraEscolares/paselista')" :active="request()->routeIs('/extraEscolares/paselista')">
    {{ __('Listas') }}
</x-responsive-nav-link>
@endcan

@can('clubs')
<x-responsive-nav-link :href="route('extraEscolares.index')" :active="request()->routeIs('extraEscolares.*')">
    {{ __('Clubs') }}
</x-responsive-nav-link>
@endcan