<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Encargados') }}
        </h2>
    </x-slot>
    <br>
    <br>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="pt-5">
                <form action="{{route('extraEscolares.encargados')}}" method="get">
                    <input type="search" name="search" value="{{$texto}}" class="w-full">
                    <button type="submit" class="mt-4 bg-green-900 text-white hover:bg-green-700 inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-gray-800 transition ease-in-out duration-150">Buscar</button>
                </form>
            </div>
            <br>
        </div>
    </div>
    <div class="flex justify-center items-center">
        <table class=" mx-5">
            <thead>
                <tr class="bg-green-900 text-white">
                    <th class="px-4 py-2 border border-gray-400">NoControl</th>
                    <th class="px-4 py-2 border border-gray-400">Nombre</th>
                    <th class="px-4 py-2 border border-gray-400">Apellido paterno</th>
                    <th class="px-4 py-2 border border-gray-400">Apellido Materno</th>
                    <th class="px-4 py-2 border border-gray-400">Curp</th>
                    <th class="px-4 py-2 border border-gray-400">Nss</th>
                    <th class="px-4 py-2 border border-gray-400">Plan de trabajo</th>
                    <th class="px-4 py-2 border border-gray-400">Editar</th>
                    <th class="px-4 py-2 border border-gray-400">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                <tr class="bg-white">
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->noControl}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->name}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->apaterno}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->amaterno}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->curp}}</td>
                    <td class="px-4 py-2 border border-gray-400">{{$alumno->nss}}</td>
                    <td class="px-4 py-2 border border-gray-400">
                        <button class="mt-4 bg-green-800 text-white hover:bg-green-600 inline-flex items-center 
                px-1 py-1 md:px-2 md:py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs md:text-xs 
                text-gray-800 uppercase tracking-widest focus:outline-none focus:ring-2 focus:ring-indigo-500 
                focus:ring-offset-gray-800 transition ease-in-out duration-150"><a download="Plan  de trabajo de {{$alumno->name}}" href="/files/{{$alumno->name}}.pdf">Descargar</a></button>
                    </td>
                    <td class="px-4 py-2 border border-gray-400"><x-primary-button class="mt-4 bg-yellow-500 text-white hover:bg-yellow-400">
                            <a href="{{route('encargado.editar',$alumno->id)}}">Editar</a>
                        </x-primary-button></td>
                    <td class="px-4 py-2 border border-gray-400">
                        <x-primary-button class="eliminar-boton mt-4 bg-red-500 text-white hover:bg-red-400" data-form-action="{{ route('encargado.eliminar', $alumno->id) }}">
                            Eliminar
                        </x-primary-button>
                        <x-comprobar-eliminacion rutaEliminar="encargado.eliminar" :tipo=$alumno />
                    </td>
                </tr>
                <x-comprobar-eliminacion rutaEliminar="encargado.eliminar" :tipo=$alumno />
                @endforeach
            </tbody>
        </table>
    </div>
    
    <script>
        // Función para abrir el modal
        function openModal(formAction) {
            const modal = document.getElementById('modal');
            const form = document.getElementById('formEliminar');

            // Cambiar la acción del formulario según el elemento que se quiera eliminar
            form.setAttribute('action', formAction);

            modal.classList.remove('hidden');
        }

        // Función para cerrar el modal
        function closeModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
        }

        // Escuchar los botones de eliminar
        document.addEventListener("DOMContentLoaded", function() {
            const botonesEliminar = document.querySelectorAll('.eliminar-boton'); // Asegúrate de que los botones tengan esta clase

            botonesEliminar.forEach(boton => {
                boton.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Obtener la acción del formulario de eliminación
                    const formAction = boton.getAttribute('data-form-action');

                    // Abrir el modal con la acción correcta
                    openModal(formAction);
                });
            });
        });
    </script>


</x-app-layout>