document.addEventListener("DOMContentLoaded", function() {
    // Obtener referencia al botón y la ventana emergente
    const botonBorrar = document.getElementById('boton-borrar');
    const modal = document.getElementById('modal');
    const cancelar = document.getElementById('cancelar');

    // Mostrar la ventana emergente al hacer clic en el botón
    botonBorrar.addEventListener('click', function() {
        modal.classList.remove('hidden');
    });

    // Ocultar la ventana emergente al hacer clic en Cancelar
    cancelar.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
});
