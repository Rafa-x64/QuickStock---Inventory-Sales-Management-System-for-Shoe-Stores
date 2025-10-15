<!--header-->
<header class="container-fluid w-100 d-block d-md-none header" style="height: 80px;">
    <div class="row h-100">
        <div class="col-11 d-flex align-items-center">
            <h2 class="custom-title my-0 mx-0">QUICKSTOCK</h2>
        </div>
        <div class="col-1 d-flex p-0 h-100">
            <button class="btn btn-link w-100 h-100 d-flex justify-content-center align-items-center" type="button" id="header-buton-menu">
                <i class="material-icons fs-3">menu</i>
            </button>
        </div>
    </div>
    <div class="row d-none" id="header-menu">
        <div class="col d-flex flex-column justify-content-between align-items-start">
            <ul>
                <li class="list-group-item mt-4">
                    <a href="" class="text-decoration-none text-white">
                        <h6 class="">INICIO</h6>
                    </a>
                </li>
                <li class="list-group-item mt-4">
                    <a href="" class="text-decoration-none text-white">
                        <h6 class="">ACERCA DE NOSOTROS</h6>
                    </a>
                </li>
                <li class="list-group-item mt-4">
                    <a href="" class="text-decoration-none text-white">
                        <h6 class="">GALERIA</h6>
                    </a>
                </li>
                <li class="list-group-item mt-4">
                    <a href="" class="text-decoration-none text-white">
                        <h6 class="">CONTACTO</h6>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
<script>
    const boton_menu = document.getElementById("header-buton-menu");
    const menu = document.getElementById("header-menu");

    // Estado de visibilidad
    let menuVisible = false;

    // Función para alternar clases
    function toggleMenu() {
        menuVisible = !menuVisible;

        if (menuVisible) {
            menu.classList.add("d-block");
            menu.classList.remove("d-none");
        } else {
            menu.classList.add("d-none");
            menu.classList.remove("d-block");
        }
    }

    // Evento click en el botón
    boton_menu.addEventListener("click", (e) => {
        e.stopPropagation(); // Evita que el clic se propague
        toggleMenu();
    });

    // Evento para cerrar al hacer clic fuera del menú
    document.addEventListener("click", (e) => {
        if (menuVisible && !menu.contains(e.target) && !boton_menu.contains(e.target)) {
            menuVisible = false;
            menu.classList.add("d-none");
            menu.classList.remove("d-block");
        }
    });
</script>