document.addEventListener("DOMContentLoaded", function() {
    // Obtener referencia al botón y la ventana emergente
    const botonBorrar = document.getElementById('boton-borrar');
    const modal = document.getElementById('modal');
    const cancelar = document.getElementById('cancelar');
    const passwordField = document.getElementById('password');

    // Mostrar la ventana emergente al hacer clic en el botón
    botonBorrar.addEventListener('click', function() {
        modal.classList.remove('hidden');
        // Enfocar el campo de contraseña después de mostrar el modal
        setTimeout(function() {
            passwordField.focus();
        }, 100); // Un pequeño retraso para asegurar que el modal está completamente visible
    });

    // Ocultar la ventana emergente al hacer clic en Cancelar
    cancelar.addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir cualquier acción por defecto
        modal.classList.add('hidden');
    });
});

