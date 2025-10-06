<!--<style>
    [class^="col"] {
        border: 2px solid blue;
    }

    [class^="row"] {
        border: 2px solid red;
    }

    [class^="container"] {
        border: 2px solid white;
    }
</style>
-->
<!--header-->
<header class="overflow-auto bg-dark bg-opacity-25 header-custom">
    <!--lista-->
    <ul class="nav justify-content-center flex-nowrap border-bottom border-2 border-dark pt-2 pb-2 header-custom-ul">
        <!--fila principal del header-->
        <div class="row w-100">
            <!--logo-->
            <div class="col-2 d-flex flex-row align-items-center justify-content-end">
                <img src="" alt="logo" class="img-fluid">
            </div>
            <!--items-->
            <ul class="nav col-8 d-flex flex-row justify-content-around align-items-center">
                <li class="nav-item header-custom-li">
                    <a class="nav-link active" aria-current="page" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link header-custom-a" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="col-2 d-flex flex-row justify-content-center align-items-center">
                <ul class="nav justify-content-center flex-nowrap header-custom-ul">
                    <li class="nav-item header-custom-li">
                        <a class="nav-link header-custom-login" aria-current="page" href="#">Iniciar sesión</a>
                    </li>
                    <li class="nav-item header-custom-li">
                        <a class="nav-link" aria-current="page" href="#">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Agrega más ítems si quieres probar el scroll -->
    </ul>
</header>