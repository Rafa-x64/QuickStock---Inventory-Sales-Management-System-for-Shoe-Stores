<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Registrar Nueva Sucursal</h1>
                </div>

                <div class="Quick-widget col-12 col-md-8 p-0 p-2">
                    <div class="col-12 Quick-form px-4 rounded-2">
                        <form action="" method="POST" class="form py-3">

                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <!-- Nombre de la Sucursal -->
                                <div class="col-md-12 d-flex flex-column py-3">
                                    <label for="nombre_sucursal" class="form-label Quick-title">Nombre de la Sucursal</label>
                                    <input type="text" id="nombre_sucursal" name="nombre_sucursal" class="Quick-form-input" maxlength="100" placeholder="Ej: QuickStock Central" required>
                                </div>

                                <!-- Dirección -->
                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="direccion_sucursal" class="form-label Quick-title">Dirección</label>
                                    <textarea id="direccion_sucursal" name="direccion_sucursal" class="Quick-form-input" rows="3" maxlength="255" placeholder="Ingrese la dirección completa..." required></textarea>
                                </div>

                                <!-- Teléfono -->
                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="telefono_sucursal" class="form-label Quick-title">Teléfono</label>
                                    <input type="tel" id="telefono_sucursal" name="telefono_sucursal" class="Quick-form-input" maxlength="50" placeholder="+58 412-5551234" required>
                                </div>

                                <!-- Gerente Asignado -->
                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="gerente_id" class="form-label Quick-title">Gerente Asignado</label>
                                    <select id="gerente_id" name="gerente_id" class="Quick-select" required>
                                        <option value="">Seleccione el gerente</option>
                                        <option value="1">Traer de la base de datos</option>
                                    </select>
                                </div>

                                <!-- Estado de la sucursal -->
                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="estado_sucursal" class="form-label Quick-title">Estado</label>
                                    <select id="estado_sucursal" name="estado_sucursal" class="Quick-select" required>
                                        <option value="activa">Activa</option>
                                        <option value="inactiva">Inactiva</option>
                                    </select>
                                </div>

                                <!-- Fecha de registro -->
                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="fecha_registro" class="form-label Quick-title">Fecha de Registro</label>
                                    <input type="date" id="fecha_registro" name="fecha_registro" class="Quick-form-input" required>
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
        </div>
    </div>
</div>