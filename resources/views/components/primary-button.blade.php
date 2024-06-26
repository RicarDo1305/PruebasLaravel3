<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center 
    px-1 py-1 md:px-2 md:py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs md:text-xs 
    text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 
    focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>

    {{ $slot }}
</button>
