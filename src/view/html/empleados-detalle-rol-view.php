<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Detalle de Rol</h1>
                </div>
            </div>
            <div class="row p-0 m-0 role-header">
                <div class="col-md-8">
                    <h2 class="mb-2">Supervisor de Ventas</h2>
                    <p class="mb-1 fs-5">Gestión de equipo de ventas y reportes del área</p>
                    <p class="mb-0 opacity-75">
                        <span class="badge bg-success me-2">Activo</span>
                        <span class="badge bg-warning">Nivel Alto de Permisos</span>
                    </p>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-end">
                    <div class="me-3 text-end">
                        <div class="fs-4">3</div>
                        <small>Usuarios Asignados</small>
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
                                <li><a class="dropdown-item" href="#"><i class="bi bi-files"></i> Duplicar Rol</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-left-right"></i> Comparar con otro rol</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-person-x"></i> Desactivar</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pestañas de Navegación -->
            <div class="row p-0 m-0 mb-4">
                <div class="col-12">
                    <ul class="nav nav-tabs" id="rolTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="usuarios-tab" data-bs-toggle="tab" data-bs-target="#usuarios" type="button" role="tab">
                                <i class="bi bi-people me-2"></i>Usuarios Asignados
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="historial-tab" data-bs-toggle="tab" data-bs-target="#historial" type="button" role="tab">
                                <i class="bi bi-clock-history me-2"></i>Historial de Modificaciones
                            </button>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contenido de las Pestañas -->
            <div class="tab-content" id="rolTabsContent">
                <!-- Usuarios Asignados -->
                <div class="tab-pane fade show active" id="usuarios" role="tabpanel">
                    <div class="info-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span>Lista de Usuarios con este Rol</span>
                            <span class="badge bg-primary">3 usuarios</span>
                        </div>
                        <div class="card-body">
                            <div class="user-item">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <strong>Ana Rodríguez</strong><br>
                                        <small class="text-muted">Gerente de Ventas - EMP-1001</small>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge bg-success">Activo</span>
                                </div>
                            </div>
                            <div class="user-item">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <strong>Carlos Pérez</strong><br>
                                        <small class="text-muted">Supervisor Regional - EMP-1002</small>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge bg-success">Activo</span>
                                </div>
                            </div>
                            <div class="user-item">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <strong>Luis Suarez</strong><br>
                                        <small class="text-muted">Analista Financiero - EMP-1003</small>
                                    </div>
                                </div>
                                <div>
                                    <span class="badge bg-success">Activo</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Historial de Modificaciones -->
                <div class="tab-pane fade" id="historial" role="tabpanel">
                    <div class="info-card">
                        <div class="card-header">Historial de Cambios en el Rol</div>
                        <div class="card-body">
                            <div class="history-item">
                                <div class="d-flex justify-content-between">
                                    <strong>Permisos de Reportes Actualizados</strong>
                                    <small class="text-muted">15/10/2024 14:30</small>
                                </div>
                                <p class="mb-1">Se agregó permiso para generar reportes avanzados</p>
                                <small class="text-muted">Modificado por: Admin User</small>
                            </div>
                            <div class="history-item">
                                <div class="d-flex justify-content-between">
                                    <strong>Restricción de Módulo Finanzas</strong>
                                    <small class="text-muted">01/08/2024 10:15</small>
                                </div>
                                <p class="mb-1">Se removió acceso al módulo de finanzas</p>
                                <small class="text-muted">Modificado por: Juan Yepez</small>
                            </div>
                            <div class="history-item">
                                <div class="d-flex justify-content-between">
                                    <strong>Creación del Rol</strong>
                                    <small class="text-muted">15/03/2023 09:00</small>
                                </div>
                                <p class="mb-1">Rol creado con permisos básicos de supervisión</p>
                                <small class="text-muted">Creado por: System Admin</small>
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
</div>