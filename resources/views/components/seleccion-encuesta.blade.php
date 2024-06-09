<div class="sections max-w-7xl bg-slate-800 text-center font-semibold text-sm md:text-lg
       text-gray-200 leading-tight p-1 md:p-3 shadow-sm rounded-lg space-x-1 grid grid-flow-col">

        <div class="{{ $carrera == 'General' ? 'bg-emerald-900' : '' }} rounded-lg">
                <x-button-seg :ruta="$ruta" carrera="General" name="General" />
        </div>
        <div class="{{ $carrera == 'ISIC' ? 'bg-emerald-900' : '' }} rounded-lg">
                <x-button-seg :ruta="$ruta" carrera="ISIC" name="ISIC" />
        </div>
        <div class="{{ $carrera == 'IIAL' ? 'bg-emerald-900' : '' }} rounded-lg">
                <x-button-seg :ruta="$ruta" carrera="IIAL" name="IIAL" />
        </div>
        <div class="{{ $carrera == 'IGEM' ? 'bg-emerald-900' : '' }} rounded-lg">
                <x-button-seg :ruta="$ruta" carrera="IGEM" name="IGEM" />
        </div>
        <div class="{{ $carrera == 'IIDN' ? 'bg-emerald-900' : '' }} rounded-lg">
                <x-button-seg :ruta="$ruta" carrera="IIDN" name="IIDN" />
        </div>

</div>