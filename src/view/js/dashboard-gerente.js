document.addEventListener('DOMContentLoaded', () => {

    //para el evento del boton del menu lateral y main content

    const menuLateral = document.getElementById('menuLateral');
    const botonToggle = document.getElementById('botonToggle');
    // 1. Obtiene la referencia al contenido principal
    const mainContent = document.getElementById('mainContent');

    if (menuLateral && botonToggle && mainContent) {
        botonToggle.addEventListener('click', () => {

            // Alterna la clase 'expanded' en el menú lateral (Cambia su width)
            menuLateral.classList.toggle('expanded');

            // 2. Alterna la clase 'expanded' en el contenido principal 
            //    (Cambia su padding-left de 8.33% a 25%)
            mainContent.classList.toggle('expanded');
        });
    }

    //para los details del menu lateral

    // Selecciona todos los elementos <details> que gestionan el menú
    const detailsElements = document.querySelectorAll('details.menu-details');

    detailsElements.forEach(details => {
        // El evento 'toggle' es perfecto para esto, ya que se ejecuta al abrir o cerrar.
        details.addEventListener('toggle', function () {
            // Comprueba si el <details> actual se acaba de abrir
            if (this.open) {
                // Itera sobre todos los <details> para cerrar los que están abiertos
                detailsElements.forEach(otherDetails => {
                    // Si es un <details> diferente al actual Y está abierto, ciérralo.
                    if (otherDetails !== this && otherDetails.open) {
                        otherDetails.open = false;
                    }
                });
            }
        });
    });
});

//para las graficas:
let mychart = document.getElementById("myChart").getContext("2d");

var chart = new Chart(mychart, {
    type: "bar",
    data: {
        labels: [
            "Zapatilla Clásica Blancas",
            "Bota Chukka de Gamuza",
            "Zapato Formal Derby",
            "Sandalia Deportiva Cómoda",
            "Mocasín de Conducción"
        ],

        // Conjunto de datos (Cantidades vendidas)
        datasets: [{
            label: "Unidades Vendidas (Top 5)",
            data: [
                1850, // Zapatilla Clásica
                1200, // Bota Chukka
                950, // Zapato Formal
                2100, // Sandalia Deportiva
                800 // Mocasín
            ],
            // Puedes personalizar los colores de las barras aquí
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)', // Azul
                'rgba(255, 99, 132, 0.7)', // Rojo
                'rgba(75, 192, 192, 0.7)', // Verde
                'rgba(255, 205, 86, 0.7)', // Amarillo
                'rgba(153, 102, 255, 0.7)' // Morado
            ],
            borderColor: 'rgba(0, 0, 0, 0.5)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Cantidad Vendida'
                }
            }
        },
        plugins: {
            legend: {
                display: false // Oculta la leyenda si solo hay un dataset
            }
        }
    }
});