<x-app-layout>

      <x-header-seg hidden="" titulo="Egresados y empleadores"/>

      <x-empleadores-form titulo="Editar empleador" 
      ruta="seguimiento.listaEm.update" 
      :empleador=$empleador 
      hidden="hidden"
      button="Editar empleador"
      rutaBack="seguimiento.listaEm.show"
      hidden2=""
      metodo="PUT"
      />

</x-app-layout>