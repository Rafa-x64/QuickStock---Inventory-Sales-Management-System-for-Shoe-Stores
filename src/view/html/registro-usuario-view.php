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

        <div class="col-12 col-md-5 px-sm-3 pt-5 d-flex flex-column justify-content-center align-items-center registro-usuario-right">
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
                            <div class="progress-step-custom" id="stepIndicator4"></div>
                        </div>

                        <form action="" method="POST"><!--asignar el id_rol automaticamente a 1 por ser el gerente (el campo no aparece ya que al registrar un Gerente este se sobreentiendo que su rol va a ser gerente)-->
                            <div class="form-steps-container mt-2">

                                <div class="form-step px-3 px-md-1 px-lg-4 w-100" id="step1">
                                    <h5 class="mt-0 mb-4 Quick-title">🏢 Información de la Sucursal (1/4)</h5>
                                    <div class="row w-100">
                                        <div class="col-12 mb-3">
                                            <label for="sucursal_nombre" class="form-label">Nombre de la Sucursal:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="sucursal_nombre" name="sucursal_nombre" maxlength="255" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="sucursal_rif" class="form-label">RIF:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="sucursal_rif" name="sucursal_rif" maxlength="20" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-step px-3 px-md-1 px-lg-4" id="step2">
                                    <h5 class="mt-0 mb-4 Quick-title">🏢 Información de la Sucursal (2/4)</h5>
                                    <div class="row w-100">
                                        <div class="col-12 mb-3">
                                            <label for="sucursal_telefono" class="form-label">Teléfono (Sucursal):</label>
                                            <input type="tel" class="form-control registro-usuario-custom-input" id="sucursal_telefono" name="sucursal_telefono" maxlength="20" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="sucursal_direccion" class="form-label">Dirección:</label>
                                            <textarea class="form-control registro-usuario-custom-input" id="sucursal_direccion" name="sucursal_direccion" maxlength="255" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-step px-3 px-md-1 px-lg-4" id="step3">
                                    <h5 class="mt-0 mb-4 Quick-title">👤 Información del Gerente (3/4)</h5>

                                    <div class="row w-100">
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="gerente_cedula" class="form-label">Cédula:</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="gerente_cedula" name="gerente_cedula" maxlength="20" required>
                                        </div>
                                        <div class="col-12 col-md-6 mb-3">
                                            <label for="gerente_telefono" class="form-label">Teléfono (Personal):</label>
                                            <input type="tel" class="form-control registro-usuario-custom-input" id="gerente_telefono" name="gerente_telefono" maxlength="20" required>
                                        </div>
                                    </div>

                                    <div class="row w-100">
                                        <div class="col-12 mb-3">
                                            <label for="gerente_nombre" class="form-label">Nombre (Gerente):</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="gerente_nombre" name="gerente_nombre" maxlength="100" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="gerente_apellido" class="form-label">Apellido (Gerente):</label>
                                            <input type="text" class="form-control registro-usuario-custom-input" id="gerente_apellido" name="gerente_apellido" maxlength="100" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-step px-3 px-md-1 px-lg-4" id="step4">
                                    <h5 class="mt-0 mb-4 Quick-title">🔑 Información de la Cuenta (4/4)</h5>
                                    <div class="row w-100">
                                        <div class="col-12 mb-3">
                                            <label for="gerente_email" class="form-label">Email (Cuenta de acceso):</label>
                                            <input type="email" class="form-control registro-usuario-custom-input" id="gerente_email" name="gerente_email" maxlength="50" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="gerente_contraseña" class="form-label">Contraseña:</label>
                                            <input type="password" class="form-control registro-usuario-custom-input" id="gerente_contraseña" name="gerente_contraseña" maxlength="100" required>
                                        </div>
                                        <input type="hidden" name="id_rol" value="2">
                                    </div>
                                </div>

                            </div>

                            <div class="navigation-buttons d-flex justify-content-end gap-2 pt-3">
                                <button type="button" class="btn Quick-title Quick-blue-btn" id="prevButton" onclick="prevStep()">
                                    <i class="fas fa-arrow-left"></i> Anterior
                                </button>
                                <button type="button" class="btn Quick-title Quick-red-btn" id="nextButton" onclick="nextStep()">
                                    Siguiente <i class="fas fa-arrow-right"></i>
                                </button>
                                <button type="submit" class="btn Quick-title Quick-red-btn" id="submitButton">
                                    Terminar registro
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="view/js/registro-usuario.js"></script>