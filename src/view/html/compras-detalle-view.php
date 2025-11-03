<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-4">
            <!-- Encabezado con breadcrumb -->
            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
                <div>
                    <h1 class="mb-1">Detalle de la Compra</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="compras-ver-listado-view.php">Compras/</a></li>
                            <li class="">COMP-01245</li>
                        </ol>
                    </nav>
                </div>
                <a href="compras-ver-listado-view.php" class="btn btn-outline-secondary mt-2 mt-md-0">
                    <i class="bi bi-arrow-left"></i> Volver al listado
                </a>
            </div>

            <!-- Información General -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-receipt"></i> Información General de la Compra
                    </h5>
                    <a href="#" class="btn btn-light btn-sm">
                        <i class="bi bi-pencil"></i> Editar Compra
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Código de Compra</label>
                            <div class="form-control bg-light">COMP-01245</div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Fecha de Compra</label>
                            <div class="form-control bg-light">2025-11-03</div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Proveedor</label>
                            <div class="form-control bg-light">Distribuidora Alpha</div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Sucursal</label>
                            <div class="form-control bg-light">QuickStock Central</div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Empleado Responsable</label>
                            <div class="form-control bg-light">Juan Pérez</div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Estado</label>
                            <div class="form-control bg-light"><span class="badge bg-success">Completada</span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detalle de Artículos -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-box-seam"></i> Artículos Comprados
                    </h5>
                    <span class="badge bg-light text-dark">3 Artículos</span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Unitario</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Monitor LED 24"</td>
                                    <td>5</td>
                                    <td>$120.00</td>
                                    <td>$600.00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Teclado Mecánico RGB</td>
                                    <td>3</td>
                                    <td>$45.00</td>
                                    <td>$135.00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Mouse Inalámbrico</td>
                                    <td>4</td>
                                    <td>$25.00</td>
                                    <td>$100.00</td>
                                </tr>
                            </tbody>
                            <tfoot class="table-active">
                                <tr>
                                    <td colspan="4" class="fw-bold text-end">Subtotal:</td>
                                    <td class="fw-bold">$835.00</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-bold text-end">IVA (16%):</td>
                                    <td class="fw-bold">$133.60</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="fw-bold text-end">Total:</td>
                                    <td class="fw-bold text-success">$968.60</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Información de Pago -->
            <div class="card mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-wallet2"></i> Información de Pago
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Método de Pago</label>
                            <div class="form-control bg-light">Transferencia Bancaria</div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Referencia</label>
                            <div class="form-control bg-light">REF-20251103-5678</div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-3">
                            <label class="form-label fw-bold text-muted small">Fecha de Pago</label>
                            <div class="form-control bg-light">2025-11-03</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>