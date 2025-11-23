<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Registrar Nueva Sucursal</h1>
                </div>

                <div class="Quick-widget col-12 col-md-8 p-0 p-2">
                    <div class="col-12 Quick-form px-4 rounded-2">
                        <form action="" method="POST" class="form py-3 needs-validate" id="formSucursal" novalidate>

                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <!-- Nombre de la Sucursal -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="nombre_sucursal" class="form-label Quick-title">Nombre de la Sucursal</label>
                                    <input type="text" id="nombre_sucursal" name="nombre_sucursal" class="Quick-form-input" maxlength="100" placeholder="Ej: QuickStock Central" required>
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- RIF  -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="rif_sucursal" class="form-label Quick-title">Numero de RIF</label>
                                    <input type="text" id="rif_sucursal" name="rif_sucursal" class="Quick-form-input" maxlength="100" placeholder="Ej: J-12345678-9" required>
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- Dirección -->
                                <div class="col-12 d-flex flex-column py-3 position-relative">
                                    <label for="direccion_sucursal" class="form-label Quick-title">Dirección</label>
                                    <textarea id="direccion_sucursal" name="direccion_sucursal" class="Quick-form-input" rows="3" maxlength="255" placeholder="Ingrese la dirección completa..." required></textarea>
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- Teléfono -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="telefono_sucursal" class="form-label Quick-title">Teléfono</label>
                                    <input type="tel" id="telefono_sucursal" name="telefono_sucursal" class="Quick-form-input" maxlength="50" placeholder="+58 412-5551234" required>
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- Fecha de registro -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="fecha_registro" class="form-label Quick-title">Fecha de Registro</label>
                                    <input type="date" id="fecha_registro" name="fecha_registro" class="Quick-form-input" required>
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- Botones -->
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center py-3">
                                    <div class="row w-100 d-flex justify-content-around">
                                        <div class="col-5 col-md-3 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success w-100">Registrar</button>
                                        </div>
                                        <div class="col-5 col-md-3 d-flex justify-content-center">
                                            <button type="reset" class="btn btn-danger w-100">Limpiar</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                include_once "controller/sucursales_añadir_C.php";

                $resultado = sucursales_añadir_C::agregarSucursal($_POST);

                if ($resultado === -1) {
                    echo '<script>alert("Esta sucursal ya existe. Intente con otro nombre.");</script>';
                    exit();
                }

                if (!$resultado) {
                    echo '<script>alert("Error al crear la sucursal. Por favor, intente nuevamente.");</script>';
                    exit();
                }

                echo '<script>alert("Sucursal creada correctamente");</script>';
                echo '<script>window.location.href = "sucursales-listado";</script>';
            }
            ?>
        </div>
    </div>
</div>

<script src="view/js/sucursales-añadir.js"></script>