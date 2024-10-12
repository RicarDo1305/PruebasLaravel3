 // Mostrar el modal
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }

    // Cerrar el modal
    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        resetModal();
    }

    // Resetear los valores dentro del modal
    function resetModal() {
        // Aquí puedes restaurar cualquier estado o valor al original si es necesario
        document.getElementById('password').value = '';
    }

    // Evento para cerrar el modal cuando se hace clic en el botón "Cancelar"
    document.getElementById('cancelar').addEventListener('click', function(event) {
        event.preventDefault();
        closeModal();
    });

    // Evento para manejar el cierre del modal y restaurar los estados
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") { // Cerrar con la tecla "Escape"
            closeModal();
        }
    });