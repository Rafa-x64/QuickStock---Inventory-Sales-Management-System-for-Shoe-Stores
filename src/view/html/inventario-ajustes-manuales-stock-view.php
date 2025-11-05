<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 Quick-title p-4">
                    <h1 class="m-0 p-0">Ajustes Manuales de Stock</h1>
                </div>

                <!-- Formulario de ajustes -->
                <div class="Quick-widget col-10 col-lg-8 p-2">
                    <div class="col-12 Quick-form px-4 rounded-2">
                        <form action="" class="form py-4">
                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <div class="col-12 col-md-6 d-flex flex-column py-3">
                                    <label for="ajuste_producto" class="form-label Quick-title">Producto</label>
                                    <select id="ajuste_producto" name="ajuste_producto" class="Quick-select" required>
                                        <option value="" selected>Seleccione un producto</option>
                                        <option value="">(Traer desde la base de datos)</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6 d-flex flex-column py-3">
                                    <label for="ajuste_sucursal" class="form-label Quick-title">Sucursal</label>
                                    <select id="ajuste_sucursal" name="ajuste_sucursal" class="Quick-select" required>
                                        <option value="" selected>Seleccione una sucursal</option>
                                        <option value="">(Traer desde la base de datos)</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6 d-flex flex-column py-3">
                                    <label for="ajuste_tipo" class="form-label Quick-title">Tipo de Ajuste</label>
                                    <select id="ajuste_tipo" name="ajuste_tipo" class="Quick-select" required>
                                        <option value="" selected>Seleccione tipo de ajuste</option>
                                        <option value="entrada">Entrada (+)</option>
                                        <option value="salida">Salida (-)</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6 d-flex flex-column py-3">
                                    <label for="ajuste_cantidad" class="form-label Quick-title">Cantidad</label>
                                    <input type="number" id="ajuste_cantidad" name="ajuste_cantidad" class="Quick-form-input" min="1" required>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="ajuste_motivo" class="form-label Quick-title">Motivo</label>
                                    <select id="ajuste_motivo" name="ajuste_motivo" class="Quick-select" required>
                                        <option value="" selected>Seleccione motivo</option>
                                        <option value="correccion">Corrección de inventario</option>
                                        <option value="merma">Daño o pérdida</option>
                                        <option value="ajuste_manual">Ajuste manual</option>
                                        <option value="error_registro">Error de carga</option>
                                    </select>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="ajuste_comentario" class="form-label Quick-title">Comentario (opcional)</label>
                                    <textarea id="ajuste_comentario" name="ajuste_comentario" class="Quick-form-input" rows="3"></textarea>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <div class="row p-0 m-0 d-flex flex-row justify-content-around align-items-center">
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-success w-100">Registrar Ajuste</button>
                                        </div>
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="reset" class="btn btn-danger w-100">Limpiar</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 p-3 mt-2 mt-md-3 Quick-title">
                <h1 class="m-0">Historial de ajustes</h1>
            </div>
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <!-- Tabla de historial de ajustes -->
                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                    <div class="col-12 Quick-table p-2 table-responsive">
                        <table class="align-middle w-100">
                            <thead class="text-center">
                                <tr>
                                    <th>Fecha</th>
                                    <th>Producto</th>
                                    <th>Tipo</th>
                                    <th>Cantidad</th>
                                    <th>Motivo</th>
                                    <th>Usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-11-03 14:22</td>
                                    <td>Zapatilla Casual Lona (Talla 39)</td>
                                    <td>Salida (-)</td>
                                    <td>3</td>
                                    <td>Daño o pérdida</td>
                                    <td>admin</td>
                                </tr>
                                <tr>
                                    <td>2025-11-03 10:15</td>
                                    <td>Botín de Cuero Clásico (Talla 40)</td>
                                    <td>Entrada (+)</td>
                                    <td>5</td>
                                    <td>Corrección de inventario</td>
                                    <td>inventario1</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>