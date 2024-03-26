<textarea
 name="{{ $name }}"
 placeholder="{{ $placeholder }}"
 class="block w-full rounded-md border-gray-300 @error($name){ border-red-600 }@enderror bg-white dark:bg-transparent 
 shadow-sm transition-colors duration-300 focus:border-indigo-300 dark:focus:ring
dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
>{{ old($name, $textAreaDev) }}</textarea>
<x-input-error class="mt-2" :messages="$errors->get( $name )" />