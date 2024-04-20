<x-app-layout>

<x-header-seg hidden="hidden" titulo="Clubs"/>

@can('see-extraescolares')
<main class="p-4">
    <div class="mx-auto mt-4 max-w-6xl grid md:grid-cols-2 gap-2 md:gap-4 lg:grid-cols-3">
        @foreach($tarjetas as $club)
        <article class="flex flex-col">
    <div class="p-5 space-x-3 flex-1">
        <x-tarjet-exadm img="{{$club->img}}" title="{{$club->title}}" incharge="{{$club->incharge}}" description="{{$club->description}}" id="{{$club->id}}"/>
        </div>
        </article>
        @endforeach
    </div>
    </main>   
    @endcan

    @can('see-clubs')
<main class="p-4">
    <div class="mx-auto mt-4 max-w-6xl grid md:grid-cols-2 gap-2 md:gap-4 lg:grid-cols-3">
        @foreach($clubs as $club)
        <article class="flex flex-col">
    <div class="p-5 space-x-3 flex-1">
        <x-tarjet-exenc img="{{$club->img}}" title="{{$club->title}}" incharge="{{$club->incharge}}" description="{{$club->description}}" id="{{$club->id}}"/>
        </div>
        </article>
        @endforeach
    </div>
    </main>   
    @endcan

@can('clubs')
<main class="p-4">
<div class="mx-auto mt-4 max-w-6xl grid md:grid-cols-2 gap-2 md:gap-4 lg:grid-cols-3">
    @foreach($tarjetas as $club)
    <article class="flex flex-col">
<div class="p-5 space-x-3 flex-1">
    <x-tarjet-ex img="{{$club->img}}" title="{{$club->title}}" incharge="{{$club->incharge}}" description="{{$club->description}}" id="{{$club->id}}"/>
    </div>
    </article>
    @endforeach
</div>
</main>
@endcan
</x-app-layout>