<x-app-layout>
    
  <x-header-seg hidden="" titulo="Seguimiento a agresados y empleadores"/>

  <x-egresados-form titulo="Añadir egresado" 
  ruta="seguimiento.agregar.store"
  :egresado=null
  hidden=""
  button="Agregar egresado"
  rutaBack="dashboard"
  hidden2="hidden"
  metodo=""
  />

  <x-empleadores-form titulo="Añadir egresado" ruta="seguimientoEg.store" />
  
</x-app-layout>