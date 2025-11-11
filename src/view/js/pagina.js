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