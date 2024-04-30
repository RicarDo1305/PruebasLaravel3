<x-slot name="header">
    <div class="flex mx-auto items-center justify-between">
        <h2 class="font-semibold text-gray-200 leading-tight text-sm sm:text-base lg:text-lg">
            {{ __($titulo) }}
        </h2>
        <div class="mr-0 md:mr-2">
         <button class="{{ $hidden }} bg-green-900 text-white hover:bg-green-700
         uppercase p-1 md:p-2 rounded-md text-xs md:text-xs font-semibold focus:ring-2
          focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out
           duration-150 focus:outline-none tracking-widest">
           <a href="{{ route('seguimiento.muestra.show') }}" class="block">Muestra</a>
         </button>
        </div>
    </div>
</x-slot>