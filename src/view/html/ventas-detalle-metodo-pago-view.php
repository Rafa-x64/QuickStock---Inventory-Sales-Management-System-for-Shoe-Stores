<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-4">

            <!-- Encabezado -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="mb-1">Detalle del Método de Pago</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="pagos-ver-metodos-view.php">Métodos de Pago</a></li>
                            <li class="breadcrumb-item active">Transferencia Bancaria</li>
                        </ol>
                    </nav>
                </div>
                <a href="pagos-ver-metodos-view.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
            </div>

            <!-- Información del Método -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-credit-card-2-front"></i> Información del Método de Pago
                    </h5>
                    <a href="editar_metodo_pago.html" class="btn btn-light btn-sm">
                        <i class="bi bi-pencil"></i> Editar Método
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Código</label>
                                <div class="form-control bg-light">MP-002</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Nombre del Método</label>
                                <div class="form-control bg-light">Transferencia Bancaria</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">¿Requiere Número de Referencia?</label>
                                <div class="form-control bg-light">
                                    <span class="badge bg-info">Sí</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Estado</label>
                                <div class="form-control bg-light">
                                    <span class="badge bg-success">Activo</span>
                                </div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Fecha de Registro</label>
                                <div class="form-control bg-light">2024-03-15</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Última Actualización</label>
                                <div class="form-control bg-light">2025-10-25</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Uso del Método de Pago -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-cash-stack"></i> Uso del Método en Ventas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Fecha de Venta</th>
                                    <th>N° Venta</th>
                                    <th>Cliente</th>
                                    <th>Monto Pagado</th>
                                    <th>N° Referencia</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-10-28</td>
                                    <td><strong>VEN-2025-178</strong></td>
                                    <td>María López</td>
                                    <td><span class="fw-bold text-success">$145.00</span></td>
                                    <td>REF-993845</td>
                                    <td><span class="badge bg-success">Procesado</span></td>
                                </tr>
                                <tr>
                                    <td>2025-09-10</td>
                                    <td><strong>VEN-2025-142</strong></td>
                                    <td>Juan Pérez</td>
                                    <td><span class="fw-bold text-success">$220.50</span></td>
                                    <td>REF-883214</td>
                                    <td><span class="badge bg-success">Procesado</span></td>
                                </tr>
                                <tr>
                                    <td>2025-08-02</td>
                                    <td><strong>VEN-2025-109</strong></td>
                                    <td>Laura Fernández</td>
                                    <td><span class="fw-bold text-success">$95.75</span></td>
                                    <td>REF-772091</td>
                                    <td><span class="badge bg-success">Procesado</span></td>
                                </tr>
                                <tr>
                                    <td>2025-07-18</td>
                                    <td><strong>VEN-2025-098</strong></td>
                                    <td>Pedro García</td>
                                    <td><span class="fw-bold text-success">$310.00</span></td>
                                    <td>REF-748212</td>
                                    <td><span class="badge bg-success">Procesado</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-active">
                                    <td colspan="3" class="fw-bold">Total de Ventas Procesadas con este Método:</td>
                                    <td class="fw-bold text-primary">$771.25</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Estadísticas del Método -->
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-graph-up"></i> Estadísticas del Método
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <h6 class="text-muted">Total Transacciones</h6>
                                <h4 class="fw-bold text-dark">48</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <h6 class="text-muted">Monto Total Procesado</h6>
                                <h4 class="fw-bold text-success">$5,882.30</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <h6 class="text-muted">Promedio por Transacción</h6>
                                <h4 class="fw-bold text-primary">$122.55</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>