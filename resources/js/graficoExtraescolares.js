import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", function () {
    var canvas = document.getElementById("grafico");
    if (canvas) {
        var ctx = canvas.getContext("2d");

        // Selecciona el elemento span con el ID 'ustota'
        var spanElement = document.getElementById('uclub');

        // Obtén solo el valor del contenido del span
        var alumnosInscritos = spanElement.textContent || spanElement.innerText;


        // Selecciona el elemento span con el ID 'ustota'
        var spanElement = document.getElementById('ustota');

        // Obtén solo el valor del contenido del span
        var alumnosTotales = spanElement.textContent || spanElement.innerText;


        var alumnosxcarrera = document.getElementById('usuariosxcarrera');
        var alumnosNoInscritos = alumnosTotales - alumnosInscritos;

        console.log(alumnosInscritos);
        var data = {
            labels: ["Alumnos Inscritos en Club", "Alumnos No Inscritos"],
            datasets: [
                {
                    label: "Cantidad de Alumnos",
                    data: [alumnosInscritos, alumnosNoInscritos],
                    backgroundColor: [
                        "rgba(54, 162, 235, 0.2)",
                        "rgba(255, 99, 132, 0.2)"
                    ],
                    borderColor: [
                        "rgba(54, 162, 235, 1)",
                        "rgba(255, 99, 132, 1)"
                    ],
                    borderWidth: 1
                }
            ]
        };

        var myChart = new Chart(ctx, {
            type: "pie", // Puedes cambiarlo a 'bar', 'line', etc.
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: "Distribución de Alumnos"
                    }
                }
            }
        });

        window.addEventListener("resize", function () {
            myChart.resize(); // Redimensionar el gráfico cuando se cambia el tamaño de la ventana
        });
    } else {
        console.log("Canvas no encontrado");
    }
});
