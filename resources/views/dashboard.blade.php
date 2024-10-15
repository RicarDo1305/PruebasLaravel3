<x-app-layout>
    <x-header-seg hidden="hidden" titulo="Sistema de gestion de vinculacion" />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 p-2 md:p-0">
            <div class="bg-gray-800 overflow-hidden shadow-sm rounded-md sm:rounded-lg">
                <div class="p-6 text-gray-100 text-xs md:text-base">
                    {{ __("Welcome") }} {{ Auth::user()->name }}
                    <br>
                    @can('clubs')
    <label class="text-white" for="">Progreso de horas:</label>
        <div class="relative pt-1">
        <div class="flex mb-2 items-center justify-between">
        <div>
            <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                {{ auth()->user()->horas }} horas liberadas de 250
            </span>
            </div>
            </div>
        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
        <div style="width:{{ (auth()->user()->horas / 250) * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
            </div>
            </div>
        <div>
        <button type="submit" class="mt-4 bg-gray-200 hover:bg-gray-300 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150">
        <a href="{{ route('alumnos.historial', auth()->user()->noControl) }}">Historial</a>
            </button>
            </div>

                    @endcan
                    @can('see-clubs')
                    <x-formSeg route="encargado.subir" chirp="" nameButton="Subir" method="">
                        <label for="">Plan de trabajo: </label>
                        <input type="file" name="plan" accept=".pdf">
                        <x-input-error :messages="$errors->get('plan')" class="mt-2" />
                    </x-formSeg>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    


</x-app-layout>