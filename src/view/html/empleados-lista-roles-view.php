<style>
    .stats-cards {
        margin-bottom: 20px;
    }

    .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        padding: 20px;
        color: white;
        text-align: center;
    }

    .stat-card h3 {
        font-size: 2rem;
        margin-bottom: 5px;
        font-weight: 700;
    }

    .stat-card p {
        margin-bottom: 0;
        opacity: 0.9;
    }

    .stat-card.secondary {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .stat-card.success {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .permission-level {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .level-high {
        background-color: #dc3545;
        color: white;
    }

    .level-medium {
        background-color: #fd7e14;
        color: white;
    }

    .level-low {
        background-color: #198754;
        color: white;
    }

    .level-basic {
        background-color: #6c757d;
        color: white;
    }
</style>
</head>

<body>
    <div class="container-fluid" id="mainContent">
        <div class="row">
            <div class="col-12 p-5">
                <div class="row d-flex flex-row justify-content-center align-items-center">
                    <div class="col-6 p-5 Quick-title">
                        <h1>Lista de Roles</h1>
                    </div>

                    <div class="col-6 p-5 d-flex flex-row justify-content-end align-items-center">
                        <form action="">
                            <input type="search" placeholder="Buscar por nombre del rol" class="Quick-input" id="roles-buscar">
                            <button type="submit" class="btn btn-secondary">
                                <i class="bi bi-search fs-6"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Tarjetas de estadísticas -->
                    <div class="row p-0 m-0 stats-cards">
                        <div class="col-md-3 mb-3">
                            <div class="stat-card">
                                <h3>6</h3>
                                <p>Total de Roles</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card secondary">
                                <h3>5</h3>
                                <p>Roles Activos</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card success">
                                <h3>1</h3>
                                <p>Roles Inactivos</p>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="stat-card" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                                <h3>25</h3>
                                <p>Usuarios Asignados</p>
                            </div>
                        </div>
                    </div>
                    <div class="row p-0 m-0 sort-options">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Ordenar por:</h5>
                            <div>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-primary active">Nivel de Permisos</button>
                                    <button type="button" class="btn btn-outline-primary">Cantidad de Usuarios</button>
                                    <button type="button" class="btn btn-outline-primary">Nombre</button>
                                    <button type="button" class="btn btn-outline-primary">Estado</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de roles -->
                    <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                        <div class="col-12 Quick-table pt-5 mb-3">
                            <table class="w-100">
                                <thead>
                                    <tr>
                                        <th>Nombre del Rol</th>
                                        <th>Descripción</th>
                                        <th>Nivel de Permisos</th>
                                        <th>Usuarios Asignados</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Administrador</strong>
                                        </td>
                                        <td>Acceso completo a todos los módulos del sistema</td>
                                        <td>
                                            <span class="permission-level level-high">Máximo</span>
                                        </td>
                                        <td>
                                            <span class="users-indicator users-high">
                                                <i class="bi bi-people me-1"></i> 3 usuarios
                                            </span>
                                        </td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Supervisor de Ventas</strong>
                                        </td>
                                        <td>Gestión de equipo de ventas y reportes del área</td>
                                        <td>
                                            <span class="permission-level level-medium">Alto</span>
                                        </td>
                                        <td>
                                            <span class="users-indicator users-high">
                                                <i class="bi bi-people me-1"></i> 8 usuarios
                                            </span>
                                        </td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-sm btn-secondary btn-action">
                                                <i class="bi bi-pause-circle"></i> Desactivar
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Analista Financiero</strong>
                                        </td>
                                        <td>Acceso a módulos financieros y reportes contables</td>
                                        <td>
                                            <span class="permission-level level-medium">Medio</span>
                                        </td>
                                        <td>
                                            <span class="users-indicator users-medium">
                                                <i class="bi bi-people me-1"></i> 5 usuarios
                                            </span>
                                        </td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-sm btn-secondary btn-action">
                                                <i class="bi bi-pause-circle"></i> Desactivar
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Coordinador Operaciones</strong>
                                        </td>
                                        <td>Gestión de inventario y procesos operativos</td>
                                        <td>
                                            <span class="permission-level level-low">Básico</span>
                                        </td>
                                        <td>
                                            <span class="users-indicator users-medium">
                                                <i class="bi bi-people me-1"></i> 6 usuarios
                                            </span>
                                        </td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-sm btn-secondary btn-action">
                                                <i class="bi bi-pause-circle"></i> Desactivar
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Usuario de Consulta</strong>
                                        </td>
                                        <td>Acceso de solo lectura a información general</td>
                                        <td>
                                            <span class="permission-level level-basic">Mínimo</span>
                                        </td>
                                        <td>
                                            <span class="users-indicator users-low">
                                                <i class="bi bi-people me-1"></i> 2 usuarios
                                            </span>
                                        </td>
                                        <td><span class="badge bg-success">Activo</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-sm btn-secondary btn-action">
                                                <i class="bi bi-pause-circle"></i> Desactivar
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Auditor Interno</strong>
                                        </td>
                                        <td>Acceso especial para revisiones y auditorías</td>
                                        <td>
                                            <span class="permission-level level-medium">Medio</span>
                                        </td>
                                        <td>
                                            <span class="users-indicator users-low">
                                                <i class="bi bi-people me-1"></i> 1 usuario
                                            </span>
                                        </td>
                                        <td><span class="badge bg-secondary">Inactivo</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>
                                            <a href="#" class="btn btn-sm btn-success btn-action">
                                                <i class="bi bi-play-circle"></i> Activar
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row p-0 m-0 mt-4">
                        <div class="col-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>