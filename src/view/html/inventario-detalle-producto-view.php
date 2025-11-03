<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-4">

            <!-- Encabezado -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="mb-1">Detalle del Calzado</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="inventario-ver-productos">Inventario</a></li>
                            <li class="breadcrumb-item active">Nike Air Max 2024</li>
                        </ol>
                    </nav>
                </div>
                <a href="inventario-ver-productos" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>

            <!-- Información del Calzado -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-box"></i> Información General</h5>
                    <a href="inventario-editar-producto" class="btn btn-light btn-sm">
                        <i class="bi bi-pencil"></i> Editar
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Columna izquierda -->
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="fw-bold text-muted small">Código</label>
                                <div class="form-control bg-light">ZAP-001</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="fw-bold text-muted small">Modelo</label>
                                <div class="form-control bg-light">Nike Air Max 2024</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="fw-bold text-muted small">Marca</label>
                                <div class="form-control bg-light">Nike</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="fw-bold text-muted small">Categoría</label>
                                <div class="form-control bg-light">Deportivos</div>
                            </div>
                        </div>

                        <!-- Columna derecha -->
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="fw-bold text-muted small">Género</label>
                                <div class="form-control bg-light">Unisex</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="fw-bold text-muted small">Precio Venta</label>
                                <div class="form-control bg-light text-success fw-bold">$89.99</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="fw-bold text-muted small">Proveedor</label>
                                <div class="form-control bg-light">Calzados Global S.A.</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="fw-bold text-muted small">Estado</label>
                                <div class="form-control bg-light"><span class="badge bg-success">Disponible</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Variantes (tallas y colores) -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="bi bi-palette"></i> Variantes Disponibles</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Código SKU</th>
                                    <th>Color</th>
                                    <th>Talla</th>
                                    <th>Precio</th>
                                    <th>Stock Total</th>
                                    <th>Stock Mínimo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>SKU-NK2024-AZ-40</td>
                                    <td>Azul</td>
                                    <td>40</td>
                                    <td>$89.99</td>
                                    <td>25</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>SKU-NK2024-AZ-41</td>
                                    <td>Azul</td>
                                    <td>41</td>
                                    <td>$89.99</td>
                                    <td>18</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>SKU-NK2024-NG-42</td>
                                    <td>Negro</td>
                                    <td>42</td>
                                    <td>$89.99</td>
                                    <td>32</td>
                                    <td>5</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Distribución por Sucursal -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0"><i class="bi bi-shop"></i> Distribución por Sucursal</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Sucursal</th>
                                    <th>Stock Disponible</th>
                                    <th>Stock Reservado</th>
                                    <th>Última Actualización</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>QuickStock Central</td>
                                    <td>40</td>
                                    <td>3</td>
                                    <td>2025-10-12</td>
                                </tr>
                                <tr>
                                    <td>Sucursal Norte</td>
                                    <td>20</td>
                                    <td>1</td>
                                    <td>2025-10-11</td>
                                </tr>
                                <tr>
                                    <td>Sucursal Este</td>
                                    <td>15</td>
                                    <td>0</td>
                                    <td>2025-10-10</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Estadísticas del Producto -->
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-bar-chart"></i> Estadísticas de Ventas</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <h6 class="text-muted">Unidades Vendidas</h6>
                                <h4 class="fw-bold text-dark">156</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <h6 class="text-muted">Ingresos Totales</h6>
                                <h4 class="fw-bold text-success">$14,038.44</h4>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="p-3 border rounded bg-light shadow-sm">
                                <h6 class="text-muted">Rotación Promedio</h6>
                                <h4 class="fw-bold text-primary">2.8 veces/mes</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>