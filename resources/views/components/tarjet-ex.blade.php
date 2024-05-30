<article class="bg-slate-700 shadow rounded overflow-hidden flex flex-col">
            <div class="h-52">
                <img 
                class="h-full w-full object-cover object-center"
                src="img/{{$img}}"
                alt="Imagen de referencia">
            </div>
            <div class="p-5 space-x-3 flex-1">
                @php
                    $titulo=preg_replace('([^A-Za-z])', '', $title);
                @endphp
                <h3 class="p-3 text-xl font-semibold text-sky-500">{{$title}}</h3>
                <h2 class="text-lg font-semibold text-white leading-tight">
                    Encargado: {{  $incharge }}
                </h2>
                <p class="text-slate-500 text-white">
                    {{ $description }}
                </p>
                <br>
                @php
                $club=DB::table($titulo)->where('name',auth()->user()->name)->first();
                @endphp
                @if (empty($club)== true)
                    <x-primary-button class="mt-4 bg-green-900 text-white hover:bg-green-700">
                        <a href="{{route('registroaclub.index',$id)}}">Registrarme</a>
                    </x-primary-button>
                    @else
                    <x-primary-button class="mt-4 bg-red-900 text-white hover:bg-red-700">
                        <a href="{{route('club.salir',$title)}}">Salir</a>
                    </x-primary-button>
                @endif
                
            </div>
</article>