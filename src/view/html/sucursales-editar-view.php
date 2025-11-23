<?php
$accion = $_POST["accion"] ?? null;
$id_sucursal = $_POST["id_sucursal"] ?? null;
?>
<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">

            <div class="row d-flex flex-row justify-content-between align-items-center">
                <div class="col-12 col-md-6 p-3 Quick-title">
                    <h1 class="m-0">Editar Sucursal</h1>
                </div>
            </div>

            <div class="row d-flex flex-column justify-content-center align-items-center">
                <div class="col-12 col-md-8 p-0 p-2 Quick-widget">
                    <div class="col-12 Quick-form px-5 rounded-2">

                        <form action="" method="POST" class="form needs-validation" id="form_editar_sucursal" novalidate>
                            <div class="row d-flex flex-row justify-content-start align-items-center">

                                <!-- Acción oculta -->
                                <input type="hidden" name="accion" value="__editar">

                                <!-- ID de la sucursal (oculto, no editable) -->
                                <input type="hidden" name="id_sucursal" id="id_sucursal" value="<?php echo $id_sucursal; ?>">

                                <!-- Nombre -->
                                <div class="col-12 col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="nombre_sucursal_editar" class="form-label Quick-title">Nombre de la Sucursal</label>
                                    <input
                                        type="text"
                                        id="nombre_sucursal_editar"
                                        name="nombre_sucursal"
                                        class="Quick-form-input form-control"
                                        required
                                        maxlength="120"
                                        placeholder="Ej: QuickStock Central">
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- RIF -->
                                <div class="col-12 col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="rif_sucursal_editar" class="form-label Quick-title">RIF</label>
                                    <input
                                        type="text"
                                        id="rif_sucursal_editar"
                                        name="rif_sucursal"
                                        class="Quick-form-input form-control"
                                        required
                                        maxlength="255"
                                        placeholder="Ej: J-12345678-9">
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- Dirección -->
                                <div class="col-12 d-flex flex-column py-3 position-relative">
                                    <label for="direccion_sucursal_editar" class="form-label Quick-title">Dirección</label>
                                    <textarea
                                        id="direccion_sucursal_editar"
                                        name="direccion_sucursal"
                                        class="Quick-form-input form-control"
                                        rows="3"
                                        maxlength="255"
                                        placeholder="Ingrese la dirección completa..."
                                        required></textarea>
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- Teléfono -->
                                <div class="col-12 col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="telefono_sucursal_editar" class="form-label Quick-title">Teléfono</label>
                                    <input
                                        type="tel"
                                        id="telefono_sucursal_editar"
                                        name="telefono_sucursal"
                                        class="Quick-form-input form-control"
                                        maxlength="20"
                                        required
                                        placeholder="+58 412-5551234">
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- Fecha de Registro -->
                                <div class="col-12 col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="fecha_registro_editar" class="form-label Quick-title">Fecha de Registro</label>
                                    <input
                                        type="date"
                                        id="fecha_registro_editar"
                                        name="fecha_registro"
                                        class="Quick-form-input form-control"
                                        required>
                                    <div class="invalid-tooltip"></div>
                                </div>

                                <!-- Estado Activo -->
                                <div class="col-12 col-md-6 d-flex flex-column py-3">
                                    <label for="activo_sucursal_editar" class="form-label Quick-title">Estado</label>
                                    <select name="activo" id="activo_sucursal_editar" class="Quick-select form-select">
                                        <option value="true">Activo</option>
                                        <option value="false">Inactivo</option>
                                    </select>
                                </div>

                                <!-- Botones -->
                                <div class="col-12 d-flex flex-column py-3">
                                    <div class="row p-0 m-0 d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-around">

                                        <div class="col-12 col-md-3 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success w-100">Guardar</button>
                                        </div>

                                        <div class="col-12 mt-2 mt-md-0 col-md-3 d-flex justify-content-center">
                                            <button type="button" class="btn btn-danger w-100" id="reestablecerBtn">Reestablecer</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST["accion"] ?? null) == "__editar") {

                include_once "controller/sucursales_editar_C.php";
                $resultado = sucursales_editar_C::editarSucursal($_POST);

                if ($resultado === true) {
                    echo '<script>alert("Sucursal actualizada correctamente")</script>';
                    echo '<script>window.location.href = "sucursales-listado"</script>';
                } else {
                    echo '<script>alert("Error al actualizar la sucursal")</script>';
                }
            }
            ?>
        </div>
    </div>
</div>

<script src="view/js/sucursales-editar.js"></script>
<script type="module" src="api/client/sucursales-editar.js"></script>