<div class="container-fluid px-0 px-md-3">
    <div class="row p-1 p-md-3 mx-1 mx-md-3 d-flex flex-row justify-content-around registro-usuario">
        <div class="col-6 d-none d-md-block p-0">
            <div class="registro-usuario-left">
                <div id="miCarouselCrossfade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#miCarouselCrossfade" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#miCarouselCrossfade" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#miCarouselCrossfade" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#miCarouselCrossfade" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo SERVERURL ?>/assets/images/registro-usuario-first-image.jpg" alt="Primera Imagen del Carrusel con Fundido">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo SERVERURL ?>/assets/images/registro-usuario-second-image.jpg" alt="Segunda Imagen del Carrusel con Fundido">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo SERVERURL ?>/assets/images/registro-usuario-third-image.jpg" alt="Tercera Imagen del Carrusel con Fundido">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo SERVERURL ?>/assets/images/registro-usuario-fourth-image.jpg" alt="Cuarta Imagen del Carrusel con Fundido">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#miCarouselCrossfade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#miCarouselCrossfade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 px-2 pt-5 d-flex flex-column justify-content-center align-items-center registro-usuario-right">
            <div class="row w-100">
                <div class="col-12 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                    <h3 class="Quick-title text-uppercase">Formulario de Registro</h3>
                </div>
                <div class="col-12 p-0 px-md-2">
                    <div id="multiStepForm" class="p-0 pb-5 w-100">
                        <div class="progress-bar-custom mt-4">
                            <div class="progress-step-custom active" id="stepIndicator1"></div>
                            <div class="progress-step-custom" id="stepIndicator2"></div>
                            <div class="progress-step-custom" id="stepIndicator3"></div>
                        </div>
                        <form action="" method="POST">
                            <div class="form-steps-container mt-2">
                                <div class="form-step px-1 px-md-1 px-lg-4 w-100" id="step1">
                                    <h5 class="mt-0 mb-4 Quick-title">Datos de la Sucursal Principal</h5>
                                    <div class="row w-100">
                                        <div class="col-12 col-md-12 col-lg-6 mb-3">
                                            <label for="sucursal_nombre" class="form-label">Nombre:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="sucursal_nombre" name="sucursal_nombre" required>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-6 mb-3">
                                            <label for="sucursal_telefono" class="form-label">Telefono:</label>
                                            <input type="tel" class="form-control registro-usuario-custom-input" id="sucursal_telefono" name="sucursal_telefono" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="sucursal_direccion" class="form-label">Direccion:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="sucursal_direccion" name="sucursal_direccion" required>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                                        <button type="button" class="btn Quick-title Quick-red-btn" onclick="nextStep()">Siguiente</button>
                                    </div>
                                </div>
                                <div class="form-step px-1 px-md-1 px-lg-4" id="step2">
                                    <h5 class="mt-0 mb-4 Quick-title">Datos de Usuario</h5>
                                    <div class="row w-100">
                                        <div class="col-12 mb-3">
                                            <label for="usuario_nombre" class="form-label">Nombre de usuario:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="usuario_nombre" name="usuario_nombre" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="usuario_contraseña" class="form-label">Contraseña:</label>
                                            <input type="password" class="form-control registro-usuario-custom-input" id="usuario_contraseña" name="usuario_contraseña" required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="usuario_rol" class="form-label">Rol:</label>
                                            <select name="usuario_rol" id="usuario_rol" class="form-select registro-usuario-custom-input">
                                                <option value="activo">traerlo desde la bd con js</option>
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="usuario_estado" class="form-label">Estado:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="usuario_estado" name="usuario_estado" value="activo" readonly required>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                                        <button type="button" class="btn Quick-title Quick-blue-btn me-md-2" onclick="prevStep()">Anterior</button>
                                        <button type="button" class="btn Quick-title Quick-red-btn" onclick="nextStep()">Siguiente</button>
                                    </div>
                                </div>
                                <div class="form-step px-1 px-md-1 px-lg-4" id="step3">
                                    <div class="row w-100">
                                        <h5 class="mt-0 mb-4 Quick-title">Datos Personales</h5>
                                        <div class="col-12 mb-3">
                                            <label for="empleado_nombre" class="form-label">Nombre Completo:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="empleado_nombre" name="empleado_nombre" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="empleado_cargo" class="form-label">Cargo:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="empleado_cargo" name="empleado_cargo" required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="empleado_sucursal" class="form-label">Sucursal:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="empleado_sucursal" name="empleado_sucursal" readonly required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="empleado_usuario" class="form-label">Usuario:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="empleado_usuario" name="empleado_usuario" readonly required>
                                        </div>
                                    </div>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-3">
                                        <button type="button" class="btn Quick-title Quick-blue-btn me-md-2" onclick="prevStep()">Anterior</button>
                                        <button type="submit" class="btn Quick-title Quick-red-btn">Terminar registro</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="view/js/registro-usuario.js"></script>