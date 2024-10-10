<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Registro') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-screen-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <x-formSeg route="registroaclub.store" chirp="" nameButton="Registrarme" method="" enctype="multipart/form-data">
                        <div class="grid grid-cols-2 gap-6">

                            <!-- Club -->
                            <div class="col-span-2">
                                <label>Club: </label>
                                <textarea name="club" readonly="readonly" placeholder="{{$id}}" class="block w-full rounded-md border-gray-300 bg-transparent 
                                shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring
                               focus:ring-indigo-200 focus:ring-opacity-50 text-sm md:text-base">{{$id}}</textarea>
                            </div>

                            <!-- Carrera -->
                            <div>
                                <label for="">Seleccione su carrera:</label>
                                <select name="carrera" class="w-full text-black text-sm">
                                    <option value="ISIC">ISIC</option>
                                    <option value="IGEM">IGEM</option>
                                    <option value="IIAL">IIAL</option>
                                    <option value="IIDN">IIND</option>
                                </select>
                            </div>

                            <!-- Semestre -->
                            <div>
                                <label for="">Seleccione su semestre:</label>
                                <select name="semestre" class="w-full text-black text-sm">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <!-- Sexo -->
                            <div>
                                <label for="">Seleccione su sexo:</label>
                                <select name="sexo" class="w-full text-black text-sm">
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                </select>
                            </div>

                            <!-- Fecha de ingreso -->
                            <div>
                                <x-text-area name="fechaingreso" placeholder="Fecha de ingreso al Tec" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- Tipo de sangre -->
                            <div>
                                <x-text-area name="tiposangre" placeholder="Tipo de sangre" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- CURP -->
                            <div>
                                <x-text-area name="curp" placeholder="CURP" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- NSS -->
                            <div>
                                <x-text-area name="nss" placeholder="Nss" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- Teléfono particular -->
                            <div>
                                <x-text-area name="telefonoparticular" placeholder="Teléfono particular" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- Estatura -->
                            <div>
                                <x-text-area name="estatura" placeholder="Estatura" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- Peso -->
                            <div>
                                <x-text-area name="peso" placeholder="Peso" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- Padecimientos o alergias -->
                            <div class="col-span-2">
                                <x-text-area name="padecimiento" placeholder="Padecimientos o alergias" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- Nombre del tutor -->
                            <div>
                                <x-text-area name="nombretutor" placeholder="Nombre del tutor" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- Parentesco -->
                            <div>
                                <x-text-area name="parentesco" placeholder="Parentesco" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                            <!-- Teléfono del tutor -->
                            <div>
                                <x-text-area name="telefonotutor" placeholder="Teléfono del tutor" textAreaDev="" class="text-sm w-full h-8" />
                            </div>

                        </div>

                        <!-- Botón -->
                        <div class="flex justify-end pb-6">
                            <x-button-seg name="Regresar" ruta="{{'extraEscolares.index'}}" />
                        </div>

                    </x-formSeg>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
