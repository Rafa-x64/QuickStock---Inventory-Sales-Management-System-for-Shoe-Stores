document.addEventListener('DOMContentLoaded', () => {
    // 1. Obtener todos los enlaces del menú y todas las secciones
    const menuLinks = document.querySelectorAll('.menu-lateral-custom-link');
    // Selecciona todas las secciones que tienes definidas con un ID
    const sections = document.querySelectorAll('#bienvenida, #acerca-de-nosotros, #beneficios, #comparativa, #testimonios');

    // Función para remover la clase 'active' de todos los enlaces
    function removeActiveClass() {
        menuLinks.forEach(link => {
            link.classList.remove('active');
        });
    }

    // Configuración para el observador
    const options = {
        root: null, // El viewport es el elemento raíz
        // El margen -50% asegura que una sección se considera activa cuando ha cubierto al menos la mitad de la pantalla.
        rootMargin: '0px 0px -50% 0px',
        threshold: 0 // Inicia la detección al instante
    };

    // 2. Crear el Intersection Observer
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            // Si la sección está intersectando (visible)
            if (entry.isIntersecting) {
                const sectionId = entry.target.id;

                // Remover la clase activa de todos
                removeActiveClass();

                // Encontrar el enlace que corresponde a esta sección y añadir 'active'
                // Busca el enlace con el atributo href="#ID_DE_SECCION"
                const activeLink = document.querySelector(`.menu-lateral-custom-link[href="#${sectionId}"]`);
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            }
        });
    }, options);

    // 3. Observar cada sección individualmente
    sections.forEach(section => {
        observer.observe(section);
    });
});