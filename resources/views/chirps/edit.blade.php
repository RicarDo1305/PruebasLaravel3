<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Edit Chirp') }}
        </h2>
    </x-slot>
 <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <x-form route="chirps.update" chirp="{{ $chirp->id }}" nameButton="Edit" 
    textAreaDev="{{$chirp->message}}" method="PUT"/>
    </div>
 </div>
</x-app-layout>