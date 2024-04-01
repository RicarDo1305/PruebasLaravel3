<x-app-layout>

<x-header-seg hidden="hidden" titulo="Clubs"/>
<main class="p-4">
<div class="">
@foreach($tarjetas as $club)
<div class="flex flex-col">
    <x-tarjet-ex img="{{$club->img}}" title="{{$club->title}}" incharge="{{$club->incharge}}" description="{{$club->description}}"/>
@endforeach
    </div>
</div>
</main>
</x-app-layout>