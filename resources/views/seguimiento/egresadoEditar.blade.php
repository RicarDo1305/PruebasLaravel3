<x-app-layout>

      <x-header-seg hidden="" titulo="Egresados y empleadores"/>

      <x-egresados-form titulo="Editar egresado" 
      ruta="seguimiento.lista.update" 
      :egresado=$egresado 
      hidden="hidden"
      button="Editar egresado"
      rutaBack="seguimiento.lista.show"
      hidden2=""
      metodo="PUT"
      />

</x-app-layout>