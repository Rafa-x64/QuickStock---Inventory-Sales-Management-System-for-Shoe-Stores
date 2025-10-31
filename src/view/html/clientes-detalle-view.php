<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="mb-1">Detalle del Cliente</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="clientes-ver-listado-clientes-view.php"> Clientes</a></li>
                            <li class="breadcrumb-item active">Luis Alvarez</li>
                        </ol>
                    </nav>
                </div>
                <a href="clientes.html" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
            </div>

            <div class="card mb-4">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-person-badge"></i> Información del Cliente
                    </h5>
                    <a href="editar_cliente.html" class="btn btn-light btn-sm">
                        <i class="bi bi-pencil"></i> Editar Cliente
                    </a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">ID Cliente</label>
                                <div class="form-control bg-light">CL-1001</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Nombre Completo</label>
                                <div class="form-control bg-light">Luis Alvarez</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Dirección</label>
                                <div class="form-control bg-light">Urb Sucre, calle 2</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Teléfono</label>
                                <div class="form-control bg-light">0426-899-1514</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Email</label>
                                <div class="form-control bg-light">luisalvarez@email.com</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Tipo de Cliente</label>
                                <div class="form-control bg-light">
                                    <span class="badge bg-warning">Premium</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Fecha de Registro</label>
                                <div class="form-control bg-light">2025-05-15</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-receipt"></i> Historial de Compras
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Fecha de Compra</th>
                                    <th>Número de Factura</th>
                                    <th>Monto Total</th>
                                    <th>Productos</th>
                                    <th>Sucursal</th>
                                    <th>Tipo de Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-09-25</td>
                                    <td><strong>F-005-2024</strong></td>
                                    <td>
                                        <span class="fw-bold text-success">$89.99</span>
                                    </td>
                                    <td>Zapatillas Running Pro (Talla 42)</td>
                                    <td>
                                        <span class="badge bg-info">Sucursal Norte</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Efectivo
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2025-10-20</td>
                                    <td><strong>F-002-2024</strong></td>
                                    <td>
                                        <span class="fw-bold text-success">$135.00</span>
                                    </td>
                                    <td>Botín de Cuero Clásico (Talla 40)</td>
                                    <td>
                                        <span class="badge bg-info">Sucursal Norte</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Punto de Venta
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2025-10-15</td>
                                    <td><strong>F-001-2024</strong></td>
                                    <td>
                                        <span class="fw-bold text-success">$49.99</span>
                                    </td>
                                    <td>Zapatilla Casual Lona (Talla 39)</td>
                                    <td>
                                        <span class="badge bg-info">Sucursal Centro</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Punto de Venta
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-active">
                                    <td colspan="2" class="fw-bold">Total General:</td>
                                    <td class="fw-bold text-success">$274.98</td>
                                    <td colspan="3"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalCliente" tabindex="-1" aria-labelledby="modalClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalClienteLabel">Crear Nuevo Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formCliente">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="idCliente" class="form-label">ID Cliente *</label>
                            <input type="text" class="form-control" id="idCliente" required placeholder>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre Completo *</label>
                            <input type="text" class="form-control" id="nombre" required placeholder>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono *</label>
                            <input type="text" class="form-control" id="telefono" required placeholder=>
                        </div>
                        <div class="col-md-6">
                            <label for="tipoCliente" class="form-label">Tipo de Cliente *</label>
                            <select class="form-select" id="tipoCliente" required>
                                <option value="">Seleccionar tipo...</option>
                                <option value="Regular">Regular</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección *</label>
                        <textarea class="form-control" id="direccion" rows="3" required placeholder="Dirección completa del cliente"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico *</label>
                        <input type="email" class="form-control" id="email" required placeholder="cliente@ejemplo.com">
                    </div>
                    <div class="mb-3">
                        <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
                        <input type="date" class="form-control" id="fechaRegistro">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarCliente">
                    <i class="bi bi-check-circle me-1"></i> Guardar Cliente
                </button>
            </div>
        </div>
    </div>
</div>