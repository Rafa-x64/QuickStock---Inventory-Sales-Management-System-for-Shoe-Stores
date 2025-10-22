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
</style>-->
<div class="container-fluid">
    <div class="row inicio-sesion-usuario m-1 m-lg-3">
        <div class="col-6 inicio-sesion-usuario-left d-none d-md-block m-0">

        </div>
        <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center inicio-sesion-usuario-right my-3 my-md-4 my-lg-5 p-0">
            <div class="row w-100">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center mt-3">
                    <h3 class="Quick-title text-uppercase p-0 m-0">Inicia Sesion</h3>
                </div>
                <div class="col-12 mt-3 pt-3 px-md-2 px-md-5">
                    <form action="" class="d-flex flex-column justify-content-center align-items-center">
                        <div class="row w-100">
                            <div class="col-12 p-0">
                                <label for="usuario_nombre" class="form-label">Nombre de usuario</label>
                                <input type="text" name="usuario_nombre" id="usuario_nombre" class="form-control inicio-sesion-usuario-custom-input">
                            </div>
                            <div class="col-12 p-0 mt-3">
                                <label for="usuario_contraseña" class="form-label">Contraseña</label>
                                <input type="password" name="usuario_contraseña" id="usuario_contraseña" class="form-control inicio-sesion-usuario-custom-input">
                            </div>
                            <div class="col-12 mt-4 d-flex flex-row justify-content-end align-items-center">
                                <button type="reset" class="btn Quick-title Quick-red-btn">Borrar</button>
                                <button type="submit" class="btn Quick-title Quick-white-btn">Acceder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row w-75 mt-1 mt-md-3 px-1 px-md-0">
                <div class="col-12 mt-3 pt-3 px-5 inicio-sesion-usuario-register">
                    <h6 class="text-start">No tienes una cuenta?</h6>
                </div>
                <div class="col-12 mt-1 px-5 d-flex flex-row justify-content-center align-items-center">
                    <button class="btn Quick-white-btn Quick-title w-100" id="link-registro">
                        <p class="fs-6 fs-md-5 p-0 m-0">Crear una ahora</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>