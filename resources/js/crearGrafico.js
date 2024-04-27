import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", function () {
    var tablas = document.querySelectorAll(".graficos");
    var charts = [];

    tablas.forEach(function (tabla) {
        var preguntaId = tabla.id.split("_")[1];
        var filas = tabla.querySelectorAll("tbody tr");
        var preguntaTexto = tabla
            .querySelector("td:first-child")
            .textContent.trim(); //* Obtener el texto de la pregunta

        var data = {
            labels: [],
            datasets: [
                {
                    label: "Respuestas",
                    data: [],
                    backgroundColor: [],
                    borderColor: "rgba(255, 122, 169, 1)",
                    borderWidth: 1,
                },
            ],
        };

        var backgroundColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
        ];

        filas.forEach(function (fila, index) {
            var opcion = fila
                .querySelector("td:nth-child(2)")
                .textContent.trim();
            var res = parseInt(
                fila.querySelector("td:nth-child(3)").textContent.trim()
            );

            data.labels.push(opcion);
            data.datasets[0].data.push(res);
            data.datasets[0].backgroundColor.push(
                backgroundColors[index % backgroundColors.length]
            );
        });

        var ctx = document
            .getElementById("grafico_" + preguntaId)
            .getContext("2d");
        var myChart = new Chart(ctx, {
            type: "pie",
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: preguntaTexto,
                    },
                },
            },
        });
        charts.push(myChart);
    });

    window.addEventListener("resize", function () {
        charts.forEach(function (chart) {
            chart.resize(); // Redimensionar cada gráfico
        });
    });
});
