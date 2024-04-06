<x-app-layout>
    
  <x-header-seg hidden="" titulo="Egresados y empleadores"/>

  <x-egresados-form titulo="Añadir egresado" 
  ruta="seguimiento.agregar.store"
  :egresado=null
  hidden=""
  button="Agregar egresado"
  rutaBack="dashboard"
  hidden2="hidden"
  metodo=""
  />

  <x-empleadores-form titulo="Añadir empleador" 
  ruta="seguimiento.agregarEm.store"
  :empleador=null
  hidden=""
  button="Agregar empleador"
  rutaBack="dashboard"
  hidden2="hidden"
  metodo=""
  />
  
</x-app-layout>