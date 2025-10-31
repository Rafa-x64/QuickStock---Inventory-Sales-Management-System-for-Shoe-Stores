<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="card shadow-lg">
                <div class="card-header text-white text-center">
                    <h4 class="mb-0">Módulo de Punto de Venta (Wizard)</h4>
                </div>
                <div class="card-body">

                    <div class="mb-4">
                        <ul class="nav nav-pills nav-justified" id="wizard-steps">
                            <li class="nav-item">
                                <a class="nav-link active" data-step="1" href="#">1. Cliente y Sucursal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" data-step="2" href="#">2. Detalle del Pedido</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link disabled" data-step="3" href="#">3. Pago y Confirmación</a>
                            </li>
                        </ul>
                        <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <form id="ventaWizardForm">

                        <div class="wizard-step" data-step="1">
                            <h5>Paso 1: Datos de la Venta (Venta, Cliente, Empleado, Sucursal)</h5>
                            <hr>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="idCliente" class="form-label">Cliente (<abbr title="Entidad Cliente">Id_cliente</abbr>):</label>
                                    <input type="text" class="form-control" id="idCliente" placeholder="Identificación o nombre del cliente" required>
                                    <div class="form-text">Se buscará o registrará un nuevo Cliente.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="idSucursal" class="form-label">Sucursal (<abbr title="Entidad Sucursal">Id_sucursal</abbr>):</label>
                                    <select class="form-select" id="idSucursal" required>
                                        <option value="" disabled selected>Seleccione la Sucursal</option>
                                        <option value="1">Sucursal Principal</option>
                                        <option value="2">Sucursal Norte</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="idEmpleado" class="form-label">Empleado (<abbr title="Entidad Empleado">Id_empleado</abbr>):</label>
                                    <select class="form-select" id="idEmpleado" required>
                                        <option value="" disabled selected>Seleccione el Empleado</option>
                                        <option value="101">Juan Pérez</option>
                                        <option value="102">María Gómez</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="fechaVenta" class="form-label">Fecha Venta (<abbr title="Entidad Venta">fecha_venta</abbr>):</label>
                                    <input type="date" class="form-control" id="fechaVenta" value="${new Date().toISOString().substring(0, 10)}" required>
                                </div>
                            </div>
                        </div>

                        <div class="wizard-step" data-step="2">
                            <h5>Paso 2: Artículos del Pedido (DetalleVenta, Artículo)</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-sm table-striped" id="detalleVentaTable">
                                    <thead>
                                        <tr>
                                            <th>Artículo (<abbr title="Entidad Artículo">Id_articulo</abbr>)</th>
                                            <th>Cantidad (<abbr title="Entidad DetalleVenta">cantidad</abbr>)</th>
                                            <th>Precio Base</th>
                                            <th>Descuento (%) (<abbr title="Entidad DetalleVenta">descuento</abbr>)</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-end fw-bold">TOTAL VENTA:</td>
                                            <td class="fw-bold" id="totalVentaDisplay">$ 0.00</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-success" id="addArticuloBtn"><i class="bi bi-plus-circle"></i> Agregar Artículo</button>
                            <div class="alert alert-warning mt-3" role="alert" id="detalleVacioAlert" style="display:none;">
                                ¡Debes agregar al menos un artículo para continuar!
                            </div>
                        </div>

                        <div class="wizard-step" data-step="3">
                            <h5>Paso 3: Pago, Factura y Resumen (Pago, Venta)</h5>
                            <hr>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="tipoPago" class="form-label">Tipo de Pago (<abbr title="Entidad Pago">tipo_pago</abbr>):</label>
                                    <select class="form-select" id="tipoPago" required>
                                        <option value="" disabled selected>Seleccione el Tipo</option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Tarjeta">Tarjeta de Crédito/Débito</option>
                                        <option value="Transferencia">Transferencia</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="montoPago" class="form-label">Monto Recibido (<abbr title="Entidad Pago">monto_pago</abbr>):</label>
                                    <input type="number" class="form-control" id="montoPago" step="0.01" min="0" placeholder="Monto recibido" required>
                                </div>
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        <p class="mb-0"><strong>Total a Pagar (Venta):</strong> <span id="resumenTotal">$ 0.00</span></p>
                                        <p class="mb-0"><strong>Cambio:</strong> <span id="resumenCambio">$ 0.00</span></p>
                                    </div>
                                </div>
                            </div>

                            <h6 class="mt-4">Resumen de la Venta:</h6>
                            <ul class="list-group list-group-flush" id="resumenLista">
                                <li class="list-group-item">Cliente: <span id="resumenCliente">N/A</span></li>
                                <li class="list-group-item">Sucursal: <span id="resumenSucursal">N/A</span></li>
                                <li class="list-group-item">Artículos: <span id="resumenCantArticulos">0</span></li>
                            </ul>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" id="prevBtn" style="display:none;">&laquo; Anterior</button>
                            <button type="button" class="btn btn-primary" id="nextBtn">Siguiente &raquo;</button>
                            <button type="submit" class="btn btn-success" id="submitBtn" style="display:none;">Finalizar Venta</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="view/js/punto-venta.js"></script>