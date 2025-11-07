<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Detalles de Empleado</h1>
                </div>

                <div class="row p-0 m-0 employee-header">
                    <div class="col-md-8 d-flex align-items-center">
                        <div>
                            <h2 class="mb-1">Ana Rodríguez</h2>
                            <p class="mb-1 fs-5">Gerente de Ventas - Departamento de Ventas</p>
                            <p class="mb-0 opacity-75">EMP-1001 | anarodriguez@email.com</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-end">
                        <div class="me-3">
                            <span class="badge bg-success fs-6">Activo</span>
                        </div>
                        <div>
                            <button class="btn btn-light me-2">
                                <i class="bi bi-pencil"></i> Editar
                            </button>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                    <i class="bi bi-gear"></i> Acciones
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-left-right"></i> Cambiar Departamento</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus"></i> Asignar Supervisor</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="bi bi-person-x"></i> Desactivar</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-0 m-0 mb-4">
                    <div class="col-12">
                        <ul class="nav nav-tabs" id="empleadoTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab">
                                    <i class="bi bi-info-circle me-2"></i>Información General
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="historial-tab" data-bs-toggle="tab" data-bs-target="#historial" type="button" role="tab">
                                    <i class="bi bi-clock-history me-2"></i>Historial de Cargos
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="asistencia-tab" data-bs-toggle="tab" data-bs-target="#asistencia" type="button" role="tab">
                                    <i class="bi bi-calendar-check me-2"></i>Registro de Asistencia
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="documentos-tab" data-bs-toggle="tab" data-bs-target="#documentos" type="button" role="tab">
                                    <i class="bi bi-folder me-2"></i>Documentos
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="permisos-tab" data-bs-toggle="tab" data-bs-target="#permisos" type="button" role="tab">
                                    <i class="bi bi-shield-lock me-2"></i>Permisos y Roles
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="tab-content" id="empleadoTabsContent">
                    <!-- Información General -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info-card">
                                            <div class="card-header">Datos Personales</div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td><strong>Cédula:</strong></td>
                                                        <td>V-23.895.612</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Fecha Nacimiento:</strong></td>
                                                        <td>15/03/1995</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Género:</strong></td>
                                                        <td>Femenino</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Estado Civil:</strong></td>
                                                        <td>Casada</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-card">
                                            <div class="card-header">Información de Contacto</div>
                                            <div class="card-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td><strong>Teléfono:</strong></td>
                                                        <td>0424-183-4067</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Dirección:</strong></td>
                                                        <td>Av. Principal, Caracas</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Email Personal:</strong></td>
                                                        <td>anarodriguez15@gmail.com</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="info-card">
                                            <div class="card-header">Datos Laborales</div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <strong>Fecha de Ingreso:</strong><br>
                                                        02/11/2023
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Supervisor:</strong><br>
                                                        María González
                                                    </div>
                                                    <div class="col-md-4">
                                                        <strong>Salario Base:</strong><br>
                                                        $540.00
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="stats-card primary">
                                    <h3>96%</h3>
                                    <p>Asistencia Mensual</p>
                                </div>
                                <div class="stats-card success">
                                    <h3>145%</h3>
                                    <p>Metas Cumplidas</p>
                                </div>
                                <div class="stats-card warning">
                                    <h3>2</h3>
                                    <p>Años en la Empresa</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="historial" role="tabpanel">
                        <div class="timeline">
                            <div class="timeline-item">
                                <h5>Gerente de Ventas</h5>
                                <p class="text-muted mb-1">Departamento de Ventas</p>
                                <p class="text-muted mb-1">18/11/2023 - Actual</p>
                                <p>Responsable del equipo de ventas regional</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Supervisor de Ventas</h5>
                                <p class="text-muted mb-1">Departamento de Ventas</p>
                                <p class="text-muted mb-1">15/03/2024 - 30/05/2024</p>
                                <p>Supervisión del equipo de ventas zona este</p>
                            </div>
                            <div class="timeline-item">
                                <h5>Ejecutivo de Ventas</h5>
                                <p class="text-muted mb-1">Departamento de Ventas</p>
                                <p class="text-muted mb-1">01/08/2024 - 14/12/2024</p>
                                <p>Atención a clientes corporativos</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="asistencia" role="tabpanel">
                        <div class="info-card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>Registro de Asistencia - Noviembre 2025</span>
                                <select class="form-select form-select-sm" style="width: auto;">
                                    <option>Noviembre 2025</option>
                                    <option>Octubre 2025</option>
                                    <option>Septiembre 2025</option>
                                    <option>Agosto 2025</option>
                                    <option>Julio 2025</option>
                                    <option>Junio 2025</option>
                                    <option>Mayo 2025</option>
                                    <option>Abril 2025</option>
                                    <option>Marzo 2025</option>
                                    <option>Febrero 2025</option>
                                    <option>Enero 2025</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Entrada</th>
                                                <th>Salida</th>
                                                <th>Horas Trabajadas</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01/11/2025</td>
                                                <td>08:00 AM</td>
                                                <td>05:00 PM</td>
                                                <td>9.0 horas</td>
                                                <td><span class="badge bg-success">Puntual</span></td>
                                            </tr>
                                            <tr>
                                                <td>02/11/2025</td>
                                                <td>10:15 AM</td>
                                                <td>05:30 PM</td>
                                                <td>7.25 horas</td>
                                                <td><span class="badge bg-warning">Retraso</span></td>
                                            </tr>
                                            <tr>
                                                <td>03/11/2025</td>
                                                <td>08:00 AM</td>
                                                <td>05:00 PM</td>
                                                <td>9.0 horas</td>
                                                <td><span class="badge bg-success">Puntual</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="documentos" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="card-header">Documentos Personales</div>
                                    <div class="card-body">
                                        <div class="document-item">
                                            <div>
                                                <strong>Curriculum.pdf</strong><br>
                                                <small class="text-muted">Subido: 15/06/2023</small>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-download"></i>
                                            </button>
                                        </div>
                                        <div class="document-item">
                                            <div>
                                                <strong>Cédula de Identidad.pdf</strong><br>
                                                <small class="text-muted">Subido: 15/06/2023</small>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="card-header">Documentos Laborales</div>
                                    <div class="card-body">
                                        <div class="document-item">
                                            <div>
                                                <strong>Contrato Laboral.pdf</strong><br>
                                                <small class="text-muted">Subido: 02/11/2023</small>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-download"></i>
                                            </button>
                                        </div>
                                        <div class="document-item">
                                            <div>
                                                <strong>Evaluación de Desempeño.pdf</strong><br>
                                                <small class="text-muted">Subido: 15/12/2024</small>
                                            </div>
                                            <button class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="permisos" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="card-header">Roles del Sistema</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <strong>Rol Principal:</strong>
                                            <span class="badge bg-primary ms-2">Supervisor</span>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Usuario del Sistema:</strong>
                                            <code>arodriguez</code>
                                        </div>
                                        <div>
                                            <strong>Fecha de Activación:</strong>
                                            <span>09/12/2023</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card">
                                    <div class="card-header">Permisos Asignados</div>
                                    <div class="card-body">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" checked disabled>
                                            <label class="form-check-label">Módulo de Ventas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" checked disabled>
                                            <label class="form-check-label">Módulo de Reportes</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" disabled>
                                            <label class="form-check-label">Módulo de Finanzas</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" checked disabled>
                                            <label class="form-check-label">Gestión de Equipo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>