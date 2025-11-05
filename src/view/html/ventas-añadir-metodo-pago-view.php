<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">

                <!-- Título -->
                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Registrar Nuevo Método de Pago</h1>
                    <p class="text-secondary">Agregue un nuevo tipo de método de pago al sistema</p>
                </div>

                <!-- Formulario -->
                <div class="Quick-widget col-12 col-md-6 p-0 p-2">
                    <div class="col-12 Quick-form px-4 rounded-2">
                        <form action="" method="POST" class="form py-3">

                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <!-- Nombre del método -->
                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="nombre" class="form-label Quick-title">Nombre del Método de Pago</label>
                                    <input type="text" id="nombre" name="nombre" class="Quick-form-input" maxlength="50" required placeholder="Ej. Efectivo, Tarjeta, Transferencia...">
                                </div>

                                <!-- Requiere número de referencia -->
                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="numero_referencia" class="form-label Quick-title">¿Requiere Número de Referencia?</label>
                                    <select id="numero_referencia" name="numero_referencia" class="Quick-select" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="1">Sí, requiere número de referencia</option>
                                        <option value="0">No, no requiere número de referencia</option>
                                    </select>
                                </div>

                                <!-- Botones -->
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center py-4">
                                    <div class="row w-100 d-flex justify-content-around">
                                        <div class="col-5 col-md-4 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success w-100">Guardar</button>
                                        </div>
                                        <div class="col-5 col-md-4 d-flex justify-content-center">
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