<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="mb-1">Detalle de la Sucursal</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="sucursales-ver-listado-view.php">Sucursales/</a></li>
                            <li class="">Sucursal Valencia Centro</li>
                        </ol>
                    </nav>
                </div>
                <a href="sucursales-ver-listado-view.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
            </div>

            <!-- Información de la Sucursal -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-building"></i> Información General
                    </h5>
                    <a href="editar_sucursal.html" class="btn btn-light btn-sm">
                        <i class="bi bi-pencil"></i> Editar Sucursal
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Código Sucursal</label>
                                <div class="form-control bg-light">SUC-VAL-001</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Nombre</label>
                                <div class="form-control bg-light">Sucursal Valencia Centro</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Dirección</label>
                                <div class="form-control bg-light">Av. Bolívar Norte, C.C. Cristal, Local 12</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Ciudad</label>
                                <div class="form-control bg-light">Valencia</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Teléfono</label>
                                <div class="form-control bg-light">0241-555-6789</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Correo Electrónico</label>
                                <div class="form-control bg-light">valencia.centro@sportsstore.com</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Estado</label>
                                <div class="form-control bg-light"><span class="badge bg-success">Activa</span></div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Fecha de Apertura</label>
                                <div class="form-control bg-light">2022-03-15</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gerente -->
            <div class="card mb-4">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">
                        <i class="bi bi-person-badge"></i> Gerente Asignado
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-control bg-light">María Fernanda Pérez</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-control bg-light">Cédula: V-19876543</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-control bg-light">Tel: 0414-555-2233</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empleados -->
            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-people"></i> Empleados de la Sucursal
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID Empleado</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Teléfono</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>EMP-001</td>
                                    <td>Carlos Gómez</td>
                                    <td>Vendedor</td>
                                    <td>0412-123-4567</td>
                                    <td>carlos.gomez@sportsstore.com</td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                </tr>
                                <tr>
                                    <td>EMP-002</td>
                                    <td>Luisa Torres</td>
                                    <td>Cajera</td>
                                    <td>0416-789-2345</td>
                                    <td>luisa.torres@sportsstore.com</td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Productos Disponibles -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-box-seam"></i> Inventario Actual
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Código Producto</th>
                                    <th>Nombre</th>
                                    <th>Categoría</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>PROD-101</td>
                                    <td>Zapatillas Urban Run</td>
                                    <td>Deportivo</td>
                                    <td>65</td>
                                    <td>$50.00</td>
                                    <td><span class="badge bg-success">Disponible</span></td>
                                </tr>
                                <tr>
                                    <td>PROD-207</td>
                                    <td>Sandalias Playeras</td>
                                    <td>Verano</td>
                                    <td>30</td>
                                    <td>$25.00</td>
                                    <td><span class="badge bg-warning">Stock Bajo</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-active">
                                    <td colspan="3" class="fw-bold">Total Productos:</td>
                                    <td class="fw-bold text-primary">2</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Ventas Recientes -->
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-receipt-cutoff"></i> Ventas Recientes
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Fecha</th>
                                    <th>N° Venta</th>
                                    <th>Cliente</th>
                                    <th>Total</th>
                                    <th>Método de Pago</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-10-25</td>
                                    <td>VEN-0254</td>
                                    <td>Pedro Ramos</td>
                                    <td>$120.00</td>
                                    <td>Tarjeta</td>
                                    <td><span class="badge bg-success">Completada</span></td>
                                </tr>
                                <tr>
                                    <td>2025-10-22</td>
                                    <td>VEN-0248</td>
                                    <td>María López</td>
                                    <td>$75.50</td>
                                    <td>Efectivo</td>
                                    <td><span class="badge bg-success">Completada</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-active">
                                    <td colspan="3" class="fw-bold">Total Ventas:</td>
                                    <td class="fw-bold text-success">$195.50</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>