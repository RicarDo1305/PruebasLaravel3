      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-10 text-gray-900 dark:text-gray-100">
                    <form action="{{ route($route, $chirp ?? null) }}" method="POST">
                        @csrf
                        @method($method)
<<<<<<< HEAD
                        <textarea
                        name="message"
                        placeholder="{{ $placeholder }}"
                        class="block w-full rounded-md border-gray-300 @error('message') border-red-600 @enderror bg-white dark:bg-transparent 
                        shadow-sm transition-colors duration-300 focus:border-indigo-300 dark:focus:ring
                        dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                        >{{ old('message', $textAreaDev) }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('message')" />
=======
                        <div class="space-y-3">
                        <x-text-area name="message" placeholder="¿Que estas pensando?" textAreaDev=""/>
                        </div>

>>>>>>> 5dd1dc901c635303fb86b940b163e47054b3bf09
                        <x-primary-button class="mt-4">
                            {{ __($nameButton) }}
                        </x-primary-button>
                    </form>
                </div>
            </div>
 