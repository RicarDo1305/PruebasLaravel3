document.getElementById('miFormulario').addEventListener('submit', function(event) {
    event.preventDefault();
    var erroresDiv = document.getElementById('errores');
    erroresDiv.innerHTML = '';

    var preguntas = document.querySelectorAll('[name^="pregunta_"]');
    var hayPreguntaSinContestar = false;
    
    preguntas.forEach(function(pregunta) {
        var preguntaId = pregunta.value;
        var opciones = document.querySelectorAll('[name="opcion_' + preguntaId + '"]');
        var opcionSeleccionada = Array.from(opciones).some(opcion => opcion.checked);
        
        var tarjetaPregunta = document.getElementById('tarjetaPregunta_'+preguntaId); // Declarar aquí
        
        if (!opcionSeleccionada) {
            hayPreguntaSinContestar = true;
            tarjetaPregunta.style.border = '0.5px solid red'; // Agregar el borde rojo a la pregunta sin contestar
            tarjetaPregunta.style.borderRadius = '5px';
        } else {
            tarjetaPregunta.style.border = ''; // Quitar el borde rojo si la pregunta está contestada
            tarjetaPregunta.style.borderRadius = '';
        }
    });

    if (hayPreguntaSinContestar) {
        var mensajeError = document.createElement('p');
        mensajeError.innerHTML = 'Algunas preguntas no han sido contestadas';
        erroresDiv.appendChild(mensajeError);
    } else {
        // Si no hay preguntas sin contestar, permitir el envío del formulario
        event.target.submit();
    }
});

