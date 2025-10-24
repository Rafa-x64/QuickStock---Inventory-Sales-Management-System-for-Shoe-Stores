<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="mb-1">Detalle del Proveedor</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="proveedores-ver-listado-proveedores-view.php">Proveedores</a></li>
                            <li class="breadcrumb-item active">Sports Calzados C.A.</li>
                        </ol>
                    </nav>
                </div>
                <a href="proveedores.html" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-building"></i> Información del Proveedor
                    </h5>
                    <a href="editar_proveedor.html" class="btn btn-light btn-sm">
                        <i class="bi bi-pencil"></i> Editar Proveedor
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">RIF/Cédula</label>
                                <div class="form-control bg-light">J-12345678-9</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Nombre de la Empresa</label>
                                <div class="form-control bg-light">Sports Calzados C.A.</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">País</label>
                                <div class="form-control bg-light">Venezuela</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Dirección</label>
                                <div class="form-control bg-light">Av. Principal, Zona Industrial</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Teléfono</label>
                                <div class="form-control bg-light">0412-555-1234</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Email</label>
                                <div class="form-control bg-light">sportscalzados@gmail.com</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Estado</label>
                                <div class="form-control bg-light">
                                    <span class="badge bg-success">Activo</span>
                                </div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Tipo de Proveedor</label>
                                <div class="form-control bg-light">
                                    <span class="badge bg-info">Calzado Deportivo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Persona de Contacto</label>
                                <div class="form-control bg-light">Carlos Rodríguez</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Fecha de Registro</label>
                                <div class="form-control bg-light">2023-05-10</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-box-seam"></i> Productos Suministrados
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Código Producto</th>
                                    <th>Nombre del Producto</th>
                                    <th>Categoría</th>
                                    <th>Precio Unitario</th>
                                    <th>Stock Actual</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>PROD-001</strong></td>
                                    <td>Zapatillas Running Pro</td>
                                    <td>Deportivo</td>
                                    <td>$45.00</td>
                                    <td>125</td>
                                    <td>
                                        <span class="badge bg-success">Disponible</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>PROD-002</strong></td>
                                    <td>Botín de Cuero Clásico</td>
                                    <td>Formal</td>
                                    <td>$68.50</td>
                                    <td>80</td>
                                    <td>
                                        <span class="badge bg-success">Disponible</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>PROD-003</strong></td>
                                    <td>Zapatilla Casual Lona</td>
                                    <td>Casual</td>
                                    <td>$32.99</td>
                                    <td>45</td>
                                    <td>
                                        <span class="badge bg-warning">Stock Bajo</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>PROD-004</strong></td>
                                    <td>Sandalias Deportivas</td>
                                    <td>Verano</td>
                                    <td>$25.75</td>
                                    <td>200</td>
                                    <td>
                                        <span class="badge bg-success">Disponible</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-active">
                                    <td colspan="3" class="fw-bold">Total Productos Suministrados:</td>
                                    <td class="fw-bold text-primary">4</td>
                                    <td colspan="2"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-clock-history"></i> Historial de Pedidos
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Fecha de Pedido</th>
                                    <th>Número de Pedido</th>
                                    <th>Productos</th>
                                    <th>Cantidad Total</th>
                                    <th>Monto Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-10-20</td>
                                    <td><strong>PED-2025-045</strong></td>
                                    <td>Zapatillas Running Pro (50), Botín Cuero (30)</td>
                                    <td>80</td>
                                    <td>
                                        <span class="fw-bold text-success">$4,275.00</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Entregado</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2025-09-15</td>
                                    <td><strong>PED-2025-032</strong></td>
                                    <td>Zapatilla Casual Lona (75), Sandalias (100)</td>
                                    <td>175</td>
                                    <td>
                                        <span class="fw-bold text-success">$5,186.25</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Entregado</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2025-08-05</td>
                                    <td><strong>PED-2025-018</strong></td>
                                    <td>Botín Cuero (40), Zapatillas Running (60)</td>
                                    <td>100</td>
                                    <td>
                                        <span class="fw-bold text-success">$4,740.00</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Entregado</span>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-active">
                                    <td colspan="3" class="fw-bold">Total General:</td>
                                    <td class="fw-bold text-primary">355</td>
                                    <td class="fw-bold text-success">$14,201.25</td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>