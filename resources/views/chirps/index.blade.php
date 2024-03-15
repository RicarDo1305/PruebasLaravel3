<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('chirps.store') }}" method="POST">
                        @csrf
                        <textarea
                        name="message"
                        placeholder="{{ __('What\'s on your mind?') }}"
                        class="block w-full rounded-md border-gray-300 @error('message') border-red-600 @enderror bg-white dark:bg-transparent 
                        shadow-sm transition-colors duration-300 focus:border-indigo-300 dark:focus:ring
                        dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                        >{{ old('message') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('message')" />
                        <x-primary-button class="mt-4">
                            {{ __('Chirp') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>