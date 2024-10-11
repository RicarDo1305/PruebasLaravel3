<div id="modal" class="fixed inset-0 z-10 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 bg-black opacity-50"></div>
        <div class="relative bg-slate-800 rounded-lg p-8 max-w-md">
            <h2 class="text-sm md:text-lg mb-4 text-white">¿Estás seguro que deseas eliminar?</h2>
            <h3 class="text-sm md:text-lg mb-4 text-white">Une vez eliminados los datos no se podran recuperar.</h3>
            <form id="formEliminar" method="POST" action="{{ route($rutaEliminar, $tipo) }}">
                @csrf
                @method('DELETE')
                <div class="mb-4">
                    <label for="password" class="text-white text-sm md:text-lg">Contraseña:</label>
                    <input type="password" id="password" name="password" class="text-sm md:text-lg block w-full px-4 py-2 mt-1 bg-gray-700 text-white rounded-md focus:outline-none focus:ring focus:ring-indigo-400" required>
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                </div>
                <div class="flex justify-end">
                    <button id="cancelar" type="button" class="text-sm md:text-lg text-gray-500 hover:text-gray-700 mr-4" onclick="closeModal()">Cancelar</button>
                    <x-primary-button class="text-sm md:text-lg bg-red-600 text-white hover:bg-red-800">
                        {{ __('Borrar') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</div>