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

    .stat-card.secondary {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .stat-card.success {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }
</style>
<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Listado de Empleados</h1>
                </div>

                <div class="col-6 p-5 d-flex flex-row justify-content-end align-items-center">
                    <form action="">
                        <input type="search" placeholder="Buscar empleado por ID" class="Quick-input" id="empleados-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>
                <div class="row p-0 m-0 stats-cards">
                    <div class="col-md-3 mb-3">
                        <div class="stat-card">
                            <h3>3</h3>
                            <p>Total Empleados</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card secondary">
                            <h3>4</h3>
                            <p>Empleados Activos</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card success">
                            <h3>0</h3>
                            <p>Empleados Inactivos</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="stat-card" style="background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);">
                            <h3>4</h3>
                            <p>Departamentos</p>
                        </div>
                    </div>
                </div>
                <div class="row p-0 m-0 filters-section">
                    <div class="col-12">
                        <h4 class="mb-4">Filtros</h4>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="departamento-filtro" class="form-label">Departamento</label>
                                <select class="form-select" id="departamento-filtro">
                                    <option value="">Todos los departamentos</option>
                                    <option value="ventas">Ventas</option>
                                    <option value="tecnologia">Tecnología</option>
                                    <option value="finanzas">Finanzas</option>
                                    <option value="operaciones">Operaciones</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cargo-filtro" class="form-label">Cargo</label>
                                <select class="form-select" id="cargo-filtro">
                                    <option value="">Todos los cargos</option>
                                    <option value="gerente">Gerente</option>
                                    <option value="supervisor">Supervisor</option>
                                    <option value="analista">Analista</option>
                                    <option value="desarrollador">Desarrollador</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="estado-filtro" class="form-label">Estado</label>
                                <select class="form-select" id="estado-filtro">
                                    <option value="">Todos</option>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="fecha-ingreso" class="form-label">Fecha de Ingreso</label>
                                <input type="date" class="form-control" id="fecha-ingreso">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex align-items-end">
                                <button type="button" class="btn btn-primary">Aplicar Filtros</button>
                                <button type="button" class="btn btn-outline-secondary ms-2">Limpiar Filtros</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                    <div class="col-12 Quick-table pt-5 mb-3">
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <th>ID Empleado</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Departamento</th>
                                    <th>Teléfono</th>
                                    <th>Cedula</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>EMP-1001</td>
                                    <td>Ana Rodríguez</td>
                                    <td>Gerente de Ventas</td>
                                    <td>Ventas</td>
                                    <td>0424-183-4067</td>
                                    <td>23.895.612</td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-warning btn-action">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger btn-action">
                                            <i class="bi bi-person-x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EMP-1002</td>
                                    <td>Carlos Pérez</td>
                                    <td>Desarrollador Senior</td>
                                    <td>Tecnología</td>
                                    <td>0416-987-6543</td>
                                    <td>14.589.375</td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-warning btn-action">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger btn-action">
                                            <i class="bi bi-person-x"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EMP-1003</td>
                                    <td>Luis Suarez</td>
                                    <td>Analista Financiero</td>
                                    <td>Finanzas</td>
                                    <td>0426-555-1234</td>
                                    <td>20.803.021</td>
                                    <td><span class="badge bg-success">Activo</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info text-white btn-action">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-warning btn-action">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger btn-action">
                                            <i class="bi bi-person-x"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>