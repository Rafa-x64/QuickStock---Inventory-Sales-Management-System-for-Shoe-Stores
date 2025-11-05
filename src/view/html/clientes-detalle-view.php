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

            <!-- Información del Cliente -->
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
                                <label class="form-label fw-bold text-muted small">Tipo Documento</label>
                                <div class="form-control bg-light">V - Venezolano</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">N° Documento</label>
                                <div class="form-control bg-light">12.345.678</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Nombre/Razón Social</label>
                                <div class="form-control bg-light">Luis Alvarez</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Tipo Cliente</label>
                                <div class="form-control bg-light">
                                    <span class="badge bg-primary">Natural</span>
                                </div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Teléfono</label>
                                <div class="form-control bg-light">0426-899-1514</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Email</label>
                                <div class="form-control bg-light">luisalvarez@gmail.com</div>
                            </div>
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Estado</label>
                                <div class="form-control bg-light">
                                    <span class="badge bg-success">Activo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Dirección</label>
                                <div class="form-control bg-light">Urb Sucre, calle 2, Barquisimeto, Estado Lara</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Fecha de Registro</label>
                                <div class="form-control bg-light">15/05/2025</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-group mb-3">
                                <label class="form-label fw-bold text-muted small">Última Actualización</label>
                                <div class="form-control bg-light">20/10/2025</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Información Adicional -->
            <div class="card mb-4">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-graph-up"></i> Estadísticas del Cliente
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h3 class="text-primary">15</h3>
                                    <p class="text-muted mb-0">Compras Realizadas</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h3 class="text-success">$2,845.50</h3>
                                    <p class="text-muted mb-0">Total Gastado</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h3 class="text-warning">$150.00</h3>
                                    <p class="text-muted mb-0">Promedio por Compra</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h3 class="text-info">30 días</h3>
                                    <p class="text-muted mb-0">Última Compra</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Historial de Compras -->
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <i class="bi bi-receipt"></i> Historial de Compras Recientes
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>Fecha</th>
                                    <th>N° Factura</th>
                                    <th>Descripción</th>
                                    <th>Subtotal</th>
                                    <th>IVA</th>
                                    <th>Total</th>
                                    <th>Sucursal</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>25/09/2025</td>
                                    <td><strong>FAC-2025-001245</strong></td>
                                    <td>Compra de electrónicos varios</td>
                                    <td>$258.62</td>
                                    <td>$41.38</td>
                                    <td>
                                        <span class="fw-bold text-success">$300.00</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">Sucursal Norte</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Pagado</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>20/10/2025</td>
                                    <td><strong>FAC-2025-001189</strong></td>
                                    <td>Compra de accesorios computación</td>
                                    <td>$129.31</td>
                                    <td>$20.69</td>
                                    <td>
                                        <span class="fw-bold text-success">$150.00</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">Sucursal Norte</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Pagado</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15/10/2025</td>
                                    <td><strong>FAC-2025-001056</strong></td>
                                    <td>Compra menor - oficina</td>
                                    <td>$43.10</td>
                                    <td>$6.90</td>
                                    <td>
                                        <span class="fw-bold text-success">$50.00</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">Sucursal Centro</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Pagado</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i> Ver
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="table-active">
                                    <td colspan="3" class="fw-bold">Total General:</td>
                                    <td class="fw-bold">$431.03</td>
                                    <td class="fw-bold">$68.97</td>
                                    <td class="fw-bold text-success">$500.00</td>
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

<!-- Modal para Crear/Editar Cliente -->
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
                            <label for="tipoDocumento" class="form-label">Tipo Documento *</label>
                            <select class="form-select" id="tipoDocumento" required>
                                <option value="">Seleccionar tipo...</option>
                                <option value="V">V - Venezolano</option>
                                <option value="J">J - Jurídico</option>
                                <option value="E">E - Extranjero</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="numeroDocumento" class="form-label">N° Documento *</label>
                            <input type="text" class="form-control" id="numeroDocumento" required placeholder="Ej: 12.345.678">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="idCliente" class="form-label">ID Cliente *</label>
                            <input type="text" class="form-control" id="idCliente" required placeholder="Ej: CL-1001">
                        </div>
                        <div class="col-md-6">
                            <label for="tipoCliente" class="form-label">Tipo de Cliente *</label>
                            <select class="form-select" id="tipoCliente" required>
                                <option value="">Seleccionar tipo...</option>
                                <option value="Natural">Natural</option>
                                <option value="Jurídico">Jurídico</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="nombre" class="form-label">Nombre/Razón Social *</label>
                            <input type="text" class="form-control" id="nombre" required placeholder="Nombre completo o razón social">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="telefono" class="form-label">Teléfono *</label>
                            <input type="text" class="form-control" id="telefono" required placeholder="Ej: 0426-899-1514">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" id="email" placeholder="cliente@ejemplo.com">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección *</label>
                        <textarea class="form-control" id="direccion" rows="3" required placeholder="Dirección completa del cliente"></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
                            <input type="date" class="form-control" id="fechaRegistro">
                        </div>
                        <div class="col-md-6">
                            <label for="estado" class="form-label">Estado *</label>
                            <select class="form-select" id="estado" required>
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
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