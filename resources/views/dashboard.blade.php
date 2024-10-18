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
                        <br>
                        <div class="flex justify-between items-center">
                            <div class="flex-grow">
                                <input type="file" name="plan" accept=".pdf">
                                <x-input-error :messages="$errors->get('plan')" class="mt-2" />
                            </div>
                            <div>
                                @if (file_exists(public_path('files/' . auth()->user()->name . '.pdf')))
                                <label class="text-white-700 text-sm mb-2">Estado:</label>
                                <span class="inline-flex items-center bg-green-200 text-green-800 text-xs px-2 py-1 rounded-full">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Subido
                                </span>
                                @else
                                <label class="text-white-700 text-sm mb-2">Estado:</label>
                                <span class="inline-flex items-center bg-red-200 text-red-800 text-xs px-2 py-1 rounded-full">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m9-4a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"></path>
                                    </svg>
                                    Pendiente
                                </span>
                                @endif
                            </div>
                        </div>                        
                            <br>
                    </x-formSeg>
                    @endcan
                </div>
            </div>
        </div>
    </div>

    


</x-app-layout>