<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Actualizar datos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <x-formSeg route="update.info" chirp="" nameButton="Actualizar" method="" enctype="multipart/form-data">
                        
                        <div class="grid grid-cols-2 gap-6">

                            <!-- Selección de carrera -->
                            <div class="col-span-2">
                                <label for="">Seleccione su carrera:</label>
                                <select name="carrera" class="w-full text-black">
                                    <option value="{{Auth::user()->carrera}}">...</option>
                                    <option value="ISIC">ISIC</option>
                                    <option value="IGEM">IGEM</option>
                                    <option value="IIAL">IIAL</option>
                                    <option value="IIND">IIND</option>
                                </select>
                                <label for="" class="block mt-2">Carrera actual: {{Auth::user()->carrera}}</label>
                            </div>

                            <!-- Selección de semestre -->
                            <div>
                                <label for="">Semestre :</label>
                                <select name="semestre" class="w-full text-black">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Teléfono particular -->
                            <div>
                                <label for="">Teléfono particular:</label>
                                <x-text-area name="telefonoparticular" placeholder="" textAreaDev="{{Auth::user()->telefonoparticular}}" />
                            </div>

                            <!-- Estatura -->
                            <div>
                                <label for="">Estatura:</label>
                                <x-text-area name="estatura" placeholder="Estatura" textAreaDev="{{Auth::user()->estatura}}" />
                            </div>

                            <!-- Peso -->
                            <div>
                                <label for="">Peso:</label>
                                <x-text-area name="peso" placeholder="Peso" textAreaDev="{{Auth::user()->peso}}" />
                            </div>

                            <!-- Padecimientos o alergias -->
                            <div class="col-span-2">
                                <label for="">Padecimientos o alergias:</label>
                                <x-text-area name="padecimiento" placeholder="Padecimientos o alergias" textAreaDev="{{Auth::user()->padecimiento}}" />
                            </div>

                            <!-- Nombre del tutor -->
                            <div>
                                <label for="">Nombre del tutor:</label>
                                <x-text-area name="nombretutor" placeholder="Nombre del tutor" textAreaDev="{{Auth::user()->nombretutor}}" />
                            </div>

                            <!-- Parentesco -->
                            <div>
                                <label for="">Parentesco:</label>
                                <x-text-area name="parentesco" placeholder="Parentesco" textAreaDev="{{Auth::user()->parentesco}}" />
                            </div>

                            <!-- Teléfono del tutor -->
                            <div>
                                <label for="">Teléfono del tutor:</label>
                                <x-text-area name="telefonotutor" placeholder="Teléfono del tutor" textAreaDev="{{Auth::user()->telefonotutor}}" />
                            </div>

                        </div>
                        <div class="flex justify-end">
                            <x-button-seg name="Regresar" ruta="{{'extraEscolares.index'}}" />
                        </div>

                    </x-formSeg>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
