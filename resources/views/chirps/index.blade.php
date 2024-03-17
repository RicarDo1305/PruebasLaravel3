<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-form route="chirps.store" chirp="" nameButton="Chirp" textAreaDev="" 
            placeholder="{{ __('What\'s on your mind?') }}" method=""/>

            <div class="mt-6 bg-white dark:bg-slate-800 shadow-sm rounded-lg divide-y
            dark:divide-gray-900">
            @foreach($chirps as $chirp)
             <div class="p-6 flex space-x-2">
                <svg class="h-6 w-6 text-gray-600 dark:text-gray-400 -scale-x-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800 dark:text-gray-200">
                                {{ $chirp->user->name }}
                            </span>
                            <small class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ $chirp->created_at->format('j M Y, g:i a') }}</small>
                            @if($chirp->created_at != $chirp->updated_at)
                            <small class="text-sm text-gray-600 dark:text-gray-400"> &middot; {{ __('Edited') }}</small>
                            @endif
                        </div>
                    </div>
                    <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $chirp->message }}</p>
                </div>
                @can('update', $chirp)
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
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