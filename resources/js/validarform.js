function validarFormulario() {
    var erroresDiv = document.getElementById('errores');
    erroresDiv.innerHTML = '';

    var preguntas = document.querySelectorAll('[name^="pregunta_"]');
    
    preguntas.forEach(function(pregunta) {
        var preguntaId = pregunta.value;
        var opciones = document.querySelectorAll('[name="opcion_' + preguntaId + '"]');
        var opcionSeleccionada = Array.from(opciones).some(opcion => opcion.checked);
        
        // Verificar si ya hay un mensaje de error para esta pregunta
        var mensajeErrorExistente = erroresDiv.querySelector('.error-pregunta-' + preguntaId);
        
        if (!opcionSeleccionada && !mensajeErrorExistente) {
            var mensajeError = document.createElement('p');
            mensajeError.innerHTML = 'Por favor, selecciona al menos una opción para la pregunta ' + preguntaId;
            mensajeError.classList.add('error-pregunta-' + preguntaId); // Agregar una clase única al mensaje de error
            erroresDiv.appendChild(mensajeError);
        }
    });

    return !erroresDiv.hasChildNodes(); // Permitir el envío del formulario si no hay errores
}

