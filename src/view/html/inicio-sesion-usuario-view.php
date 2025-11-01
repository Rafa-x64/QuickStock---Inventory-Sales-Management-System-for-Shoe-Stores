<style>

</style>
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
                    <form action="" class="d-flex flex-column justify-content-center align-items-center needs-validation" novalidate>
                        <div class="row w-100">
                            <div class="col-12 p-0 position-relative">
                                <label for="usuario_correo" class="form-label">Correo</label>
                                <input type="email" name="usuario_correo" id="usuario_correo" class="form-control inicio-sesion-usuario-custom-input" required>
                                <div class="invalid-tooltip">
                                    El correo es incorrecto.
                                </div>
                            </div>
                            <div class="col-12 p-0 mt-3 position-relative">
                                <label for="usuario_contraseña" class="form-label">Contraseña</label>
                                <input type="password" name="usuario_contraseña" id="usuario_contraseña" class="form-control inicio-sesion-usuario-custom-input" required>
                                <div class="invalid-tooltip">
                                    La contraseña es incorrecta.
                                </div>
                            </div>
                            <div class="col-12 mt-4 d-flex flex-row justify-content-end align-items-center">
                                <button type="reset" class="btn Quick-title inicio-sesion-usuario-limpiar-btn">Limpiar</button>
                                <button type="submit" class="btn Quick-title inicio-sesion-usuario-acceder-btn">Acceder</button>
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
                    <button class="btn inicio-sesion-usuario-acceder-btn Quick-title w-100" id="link-registro">
                        <p class="fs-6 fs-md-5 p-0 m-0">Crear una ahora</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

    const link_registro = document.getElementById("link-registro");
    link_registro.addEventListener("click", () => {
        window.location.href = "registro-usuario";
    });
</script>