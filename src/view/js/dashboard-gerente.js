document.addEventListener('DOMContentLoaded', () => {
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
});