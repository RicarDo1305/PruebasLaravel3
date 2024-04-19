import Chart from 'chart.js/auto';

document.addEventListener("DOMContentLoaded", function() {
    var preguntas = document.querySelectorAll('.p-6');
    
    preguntas.forEach(function(pregunta) {
        var preguntaId = pregunta.id.split('_')[1];
        var preguntaTexto = pregunta.querySelector('p').textContent; // Obtener el texto de la pregunta
        var elementos = pregunta.querySelectorAll('.respuesta');

        var data = {
            labels: [],
            datasets: [{
                label: 'Respuestas',
                data: [],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 2,
                barThickness: 40, // Grosor fijo de la barra
                maxBarThickness: 50, // Grosor máximo de la barra
            }]
        };

        elementos.forEach(function(elemento) {
            var opcion = elemento.getAttribute('data-opcion');
            var res = parseInt(elemento.getAttribute('data-res'));

            data.labels.push(opcion);
            data.datasets[0].data.push(res);
        });

        var ctx = document.getElementById('grafico_' + preguntaId).getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    title: {
                        display: true,
                        text: preguntaTexto
                    }
                }
            }
        });
    });
}
);
