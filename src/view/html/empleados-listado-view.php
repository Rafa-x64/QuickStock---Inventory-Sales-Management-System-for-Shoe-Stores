<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <h1 class="Quick-title">Listado de Empleados</h1>
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="row p-0 my-md-3 d-flex flex-row justify-content-around align-items-center border rounded-3 py-3">
                    <div class="col-md-2 p-0 m-0 py-2 mt-1 mt-md-0 px-1 d-flex flex-column justify-content-center align-items-center Quick-widget text-success">
                        <div class="row d-flex flex-column justify-content-center align-items-center">
                            <h3 class="text-center">3</h3>
                            <p class="text-center fw-bold">Total Empleados</p>
                        </div>
                    </div>
                    <div class="col-md-2 p-0 m-0 py-2 mt-1 mt-md-0 px-1 d-flex flex-column justify-content-center align-items-center Quick-widget text-warning">
                        <div class="row d-flex flex-column justify-content-center align-items-center">
                            <h3 class="text-center">4</h3>
                            <p class="text-center fw-bold">Empleados Activos</p>
                        </div>
                    </div>
                    <div class="col-md-2 p-0 m-0 py-2 mt-1 mt-md-0 px-1 d-flex flex-column justify-content-center align-items-center Quick-widget text-danger">
                        <div class="row d-flex flex-column justify-content-center align-items-center">
                            <h3 class="text-center">0</h3>
                            <p class="text-center fw-bold">Empleados Inactivos</p>
                        </div>
                    </div>
                    <div class="col-md-2 p-0 m-0 py-2 mt-1 mt-md-0 px-1 d-flex flex-column justify-content-center align-items-center Quick-widget text-primary">
                        <div class="row d-flex flex-column justify-content-center align-items-center">
                            <h3 class="text-center">4</h3>
                            <p class="text-center fw-bold">Sucursales</p>
                        </div>
                    </div>
                </div>
                <div class="row p-0 m-0 filters-section mt-2 mt-md-3">
                    <div class="col-12">
                        <h4 class="mb-4">Filtros</h4>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="departamento-filtro" class="form-label">Sucursal</label>
                                <select class="form-select" id="sucursal-filtro">
                                    <option value="">Todas</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="cargo-filtro" class="form-label">Cargo</label>
                                <select class="form-select" id="cargo-filtro">
                                    <option value="">Todos</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="estado-filtro" class="form-label">Estado</label>
                                <select class="form-select" id="estado-filtro">
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <button type="button" class="btn btn-outline-secondary ms-2" id="reestablecer-filtros">Limpiar Filtros</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                    <div class="col-12 Quick-table p-3">
                        <table class="w-100" id="lista_empleados">
                            <thead>
                                <tr>
                                    <th>ID Empleado</th>
                                    <th>Nombre</th>
                                    <th>Cargo</th>
                                    <th>Sucursal</th>
                                    <th>Teléfono</th>
                                    <th>Cedula</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (!$_SERVER["REQUEST_METHOD"] == "POST") {
    include_once "controller/empleados_listado_C.php";
}
?>

<script type="module" src="api/client/empleados-listado.js"></script>