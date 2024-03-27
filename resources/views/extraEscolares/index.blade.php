<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Clubs') }}
        </h2>
    </x-slot>

    <main class="p-4">

        <div class="mx-auto mt-4 max-w-6xl grid md:grid-cols-2 gap-2 md:gap-4 lg:grid-cols-3">
        <!-- Cada etiqueta article es una tarjeta -->
        <article class="bg-slate-700 shadow rounded overflow-hidden flex flex-col">
            <div class="h-52">
                <img 
                class="h-full w-full object-cover object-center"
                src="/img/atletismo.jpg" 
                alt="Imagen de referencia">
            </div>
            <div class="p-5 space-x-3 flex-1">
                <h3 class="p-3 text-xl font-semibold text-sky-500">Atletismo</h3>
                <h2 class="text-lg font-semibold text-white leading-tight">
                    Encargado: Lic.Urquiza
                </h2>
                <p class="text-slate-500 text-white">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Magni voluptatibus aspernatur dicta laborum id aut magnam 
                    non doloremque, ex consectetur nam! Alias, ipsam aut tempore
                    minus voluptate sed incidunt placeat?
                </p>
                <br>
                <x-primary-button class="mt-4 bg-green-900 text-white">
                    Registrarme
                </x-primary-button>
            </div>
            </main>
</x-app-layout>