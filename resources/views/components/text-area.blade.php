<textarea
 name="{{ $name }}"
 placeholder="{{ $placeholder }}"
 class="block w-full rounded-md border-gray-300 @error($name){ border-red-600 }@enderror bg-transparent 
 shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring
focus:ring-indigo-200 focus:ring-opacity-50 w-5 h-12 md:w-full md:h-full"
>{{ old($name, $textAreaDev) }}</textarea>
<x-input-error class="mt-2" :messages="$errors->get( $name )" />