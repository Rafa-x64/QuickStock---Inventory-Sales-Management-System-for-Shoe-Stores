<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="card shadow-lg">
                <div class="card-header text-white text-center bg-primary">
                    <h4 class="mb-0">Módulo de Punto de Venta (Wizard)</h4>
                </div>
                <div class="card-body">

                    <!-- Navegación Wizard -->
                    <div class="mb-4">
                        <ul class="nav nav-pills nav-justified" id="wizard-steps">
                            <li class="nav-item"><a class="nav-link active" data-step="1" href="#">1. Venta General</a></li>
                            <li class="nav-item"><a class="nav-link disabled" data-step="2" href="#">2. Detalle de Productos</a></li>
                            <li class="nav-item"><a class="nav-link disabled" data-step="3" href="#">3. Pago y Confirmación</a></li>
                        </ul>
                        <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width:33%"></div>
                        </div>
                    </div>

                    <!-- Formulario -->
                    <form id="ventaWizardForm" class="quick-form">

                        <!-- Paso 1 -->
                        <div class="wizard-step" data-step="1">
                            <h5>Paso 1: Datos Generales de la Venta</h5>
                            <hr>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="idCliente" class="form-label">Cliente</label>
                                    <input type="text" id="idCliente" class="form-control" placeholder="Cédula o nombre del cliente" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="idSucursal" class="form-label">Sucursal</label>
                                    <select id="idSucursal" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <option value="1">Sucursal Central</option>
                                        <option value="2">Sucursal Norte</option>
                                        <option value="3">Sucursal Sur</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="idUsuario" class="form-label">Vendedor</label>
                                    <select id="idUsuario" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <option value="101">Ana López</option>
                                        <option value="102">Carlos Pérez</option>
                                        <option value="103">María Fernández</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="idCajaTurno" class="form-label">Caja / Turno</label>
                                    <select id="idCajaTurno" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <option value="A1">Caja 1 - Mañana</option>
                                        <option value="A2">Caja 1 - Tarde</option>
                                        <option value="B1">Caja 2 - Mañana</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="fechaHora" class="form-label">Fecha y Hora</label>
                                    <input type="datetime-local" id="fechaHora" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="idMoneda" class="form-label">Moneda</label>
                                    <select id="idMoneda" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <option value="USD">Dólar (USD)</option>
                                        <option value="EUR">Euro (EUR)</option>
                                        <option value="VES">Bolívar (VES)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Paso 2 -->
                        <div class="wizard-step" data-step="2">
                            <h5>Paso 2: Detalle de Productos</h5>
                            <hr>
                            <div class="table-responsive quick-table">
                                <table class="table table-striped align-middle" id="detalleVentaTable">
                                    <thead>
                                        <tr>
                                            <th>Variante / Código de barras / SKU</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Descuento (%)</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-end fw-bold">TOTAL:</td>
                                            <td class="fw-bold" id="totalVentaDisplay">$ 0.00</td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-success" id="addArticuloBtn">
                                <i class="bi bi-plus-circle"></i> Agregar Variante
                            </button>
                        </div>

                        <!-- Paso 3 -->
                        <div class="wizard-step" data-step="3">
                            <h5>Paso 3: Pago y Confirmación</h5>
                            <hr>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="idMetodoPago" class="form-label">Método de Pago</label>
                                    <select id="idMetodoPago" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <option value="efectivo">Efectivo</option>
                                        <option value="debito">Tarjeta Débito</option>
                                        <option value="credito">Tarjeta Crédito</option>
                                        <option value="transferencia">Transferencia</option>
                                        <option value="zelle">Zelle</option>
                                        <option value="paypal">PayPal</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="montoPagado" class="form-label">Monto Pagado</label>
                                    <input type="number" id="montoPagado" step="0.01" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="idMonedaPago" class="form-label">Moneda de Pago</label>
                                    <select id="idMonedaPago" class="form-select" required>
                                        <option value="">Seleccione...</option>
                                        <option value="USD">Dólar (USD)</option>
                                        <option value="EUR">Euro (EUR)</option>
                                        <option value="VES">Bolívar (VES)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="referenciaPago" class="form-label">Referencia</label>
                                    <input type="text" id="referenciaPago" class="form-control" placeholder="Número de comprobante o ref. bancaria">
                                </div>
                            </div>

                            <div class="alert alert-info mt-3">
                                <p class="mb-1"><strong>Total Venta:</strong> <span id="resumenTotal">$0.00</span></p>
                                <p class="mb-0"><strong>Cambio:</strong> <span id="resumenCambio">$0.00</span></p>
                            </div>
                        </div>

                        <!-- Navegación -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-secondary" id="prevBtn">← Anterior</button>
                            <button type="button" class="btn btn-primary" id="nextBtn">Siguiente →</button>
                            <button type="submit" class="btn btn-success" id="submitBtn">Finalizar Venta</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="view/js/punto-venta.js"></script>