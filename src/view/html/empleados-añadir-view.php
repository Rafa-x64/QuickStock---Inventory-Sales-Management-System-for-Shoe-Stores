<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">

                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Añadir un Nuevo Empleado</h1>
                </div>

                <div class="Quick-widget col-8 p-0 p-2">
                    <div class="col-12 Quick-form px-5 rounded-2">
                        <form action="" class="form py-3">
                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="empleado_nombre" class="form-label Quick-title">Nombre Completo</label>
                                    <input type="text" id="empleado_nombre" name="empleado_nombre" class="Quick-form-input">
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="empleado_ci" class="form-label Quick-title">Cédula (CI)</label>
                                    <input type="number" id="empleado_ci" name="empleado_ci" class="Quick-form-input">
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="empleado_cargo" class="form-label Quick-title">Cargo</label>
                                    <input type="text" id="empleado_cargo" name="empleado_cargo" class="Quick-form-input">
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="empleado_telefono" class="form-label Quick-title">Teléfono</label>
                                    <input type="tel" id="empleado_telefono" name="empleado_telefono" class="Quick-form-input">
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="empleado_sucursal" class="form-label Quick-title">Sucursal</label>
                                    <select name="empleado_sucursal" id="empleado_sucursal" class="Quick-select">
                                        <option value="" selected>Seleccione la sucursal</option>
                                        <option value="1">Sucursal A</option>
                                        <option value="2">Sucursal B</option>
                                    </select>
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="usuario_rol" class="form-label Quick-title">Rol del Sistema</label>
                                    <select name="usuario_rol" id="usuario_rol" class="Quick-select">
                                        <option value="" selected>Seleccione el rol</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Vendedor</option>
                                    </select>
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="usuario_user" class="form-label Quick-title">Nombre de Usuario</label>
                                    <input type="text" id="usuario_user" name="usuario_user" class="Quick-form-input">
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="usuario_clave" class="form-label Quick-title">Contraseña</label>
                                    <input type="password" id="usuario_clave" name="usuario_clave" class="Quick-form-input">
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <div class="row p-0 m-0 d-flex flex-row justify-content-around align-items-center">
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-success">Registrar</button>
                                        </div>
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="reset" class="btn btn-danger">Limpiar</button>
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