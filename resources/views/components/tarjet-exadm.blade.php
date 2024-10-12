<article class="bg-slate-700 shadow rounded overflow-hidden flex flex-col">
    <div class="h-52">
        <img 
        class="h-full w-full object-cover object-center"
        src="img/{{$img}}"
        alt="Imagen de referencia">
    </div>
    <div class="p-5 space-x-3 flex-1">
        <h3 class="p-3 text-xl font-semibold text-sky-500">{{$title}}</h3>
        <h2 class="text-lg font-semibold text-white leading-tight">
            Encargado: {{  $incharge }}
        </h2>
        <p class="text-slate-500 text-white">
            {{ $description }}
        </p>
        <br>
        @if($club == 0)
        <div class="flex items-center">
            <label class="text-white p-2" for="">Estado:Deshabilitado</label>
            <div class="w-4 h-4 bg-red-500 ml-2"></div>
        </div>
        @else
        <div class="flex items-center">
            <label class="text-white p-2" for="">Estado:Habilitado</label>
            <div class="w-4 h-4 bg-green-500 ml-2"></div>
        </div>
        
        @endif
        <br>
        <label class="text-white">Capacidad maxima: {{$cap}}</label>
        <div style="display: inline-flex">
            <x-primary-button class="mt-4 bg-yellow-500 text-white hover:bg-yellow-400">
                <a href="{{route('club.editar',$id)}}">Editar</a>
                </x-primary-button>
                &nbsp; 
                &nbsp;
                <x-primary-button class="mt-4 bg-green-600 text-white hover:bg-green-400">
                    <a href="{{route('estado.tarjetas',$id)}}">Cambiar Estado</a>
                    </x-primary-button>
            </div>
    </div>
</article>