<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Añadir Empleados</h1>
                </div>
                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center">
                    <div class="col-12 form-container">
                        <ul class="nav nav-tabs mb-4" id="empleadoTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="datos-personales-tab" data-bs-toggle="tab" data-bs-target="#datos-personales" type="button" role="tab">
                                    <i class="bi bi-person me-2"></i>Datos Personales
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contacto-tab" data-bs-toggle="tab" data-bs-target="#contacto" type="button" role="tab">
                                    <i class="bi bi-telephone me-2"></i>Contacto
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="laboral-tab" data-bs-toggle="tab" data-bs-target="#laboral" type="button" role="tab">
                                    <i class="bi bi-briefcase me-2"></i>Datos Laborales
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="permisos-tab" data-bs-toggle="tab" data-bs-target="#permisos" type="button" role="tab">
                                    <i class="bi bi-shield-lock me-2"></i>Permisos
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="empleadoTabsContent">
                            <div class="tab-pane fade show active" id="datos-personales" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="apellido" class="form-label">Apellido</label>
                                                <input type="text" class="form-control" id="apellido" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="cedula" class="form-label">Cédula</label>
                                                <input type="text" class="form-control" id="cedula" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="fecha-nacimiento" class="form-label">Fecha de Nacimiento</label>
                                                <input type="date" class="form-control" id="fecha-nacimiento">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="genero" class="form-label">Género</label>
                                                <select class="form-select" id="genero">
                                                    <option value="">Seleccionar</option>
                                                    <option value="masculino">Masculino</option>
                                                    <option value="femenino">Femenino</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="estado-civil" class="form-label">Estado Civil</label>
                                                <select class="form-select" id="estado-civil">
                                                    <option value="">Seleccionar</option>
                                                    <option value="soltero">Soltero/a</option>
                                                    <option value="casado">Casado/a</option>
                                                    <option value="divorciado">Divorciado/a</option>
                                                    <option value="viudo">Viudo/a</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contacto" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="telefono" class="form-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="telefono">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="celular" class="form-label">Celular</label>
                                        <input type="tel" class="form-control" id="celular" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="direccion" class="form-label">Dirección</label>
                                        <textarea class="form-control" id="direccion" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email-personal" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email-personal">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Subir Documentos</label>
                                        <div class="document-upload">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Curriculum</span>
                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-upload"></i> Subir
                                                </button>
                                            </div>
                                        </div>
                                        <div class="document-upload">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span>Documentos de Identidad</span>
                                                <button type="button" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-upload"></i> Subir
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos Laborales -->
                            <div class="tab-pane fade" id="laboral" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="codigo-empleado" class="form-label">Código de Empleado</label>
                                        <input type="text" class="form-control" id="codigo-empleado" value="EMP-1049" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="fecha-ingreso" class="form-label">Fecha de Ingreso</label>
                                        <input type="date" class="form-control" id="fecha-ingreso" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="departamento" class="form-label">Departamento</label>
                                        <select class="form-select" id="departamento" required>
                                            <option value="">Seleccionar</option>
                                            <option value="ventas">Ventas</option>
                                            <option value="tecnologia">Tecnología</option>
                                            <option value="finanzas">Finanzas</option>
                                            <option value="operaciones">Operaciones</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="cargo" class="form-label">Cargo</label>
                                        <select class="form-select" id="cargo" required>
                                            <option value="">Seleccionar</option>
                                            <option value="gerente">Gerente</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="analista">Analista</option>
                                            <option value="desarrollador">Desarrollador</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="salario" class="form-label">Salario Base</label>
                                        <input type="number" class="form-control" id="salario" step="0.01">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="jornada" class="form-label">Jornada Laboral</label>
                                        <select class="form-select" id="jornada">
                                            <option value="tiempo-completo">Tiempo Completo</option>
                                            <option value="medio-tiempo">Medio Tiempo</option>
                                            <option value="por-horas">Por Horas</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="supervisor" class="form-label">Supervisor Directo</label>
                                        <select class="form-select" id="supervisor">
                                            <option value="">Sin supervisor</option>
                                            <option value="EMP-1001">Ana Rodríguez</option>
                                            <option value="EMP-1005">María González</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="estado" class="form-label">Estado</label>
                                        <select class="form-select" id="estado" required>
                                            <option value="activo">Activo</option>
                                            <option value="inactivo">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Permisos del Sistema -->
                            <div class="tab-pane fade" id="permisos" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="rol-sistema" class="form-label">Rol del Sistema</label>
                                        <select class="form-select" id="rol-sistema" required>
                                            <option value="">Seleccionar rol</option>
                                            <option value="administrador">Administrador</option>
                                            <option value="supervisor">Supervisor</option>
                                            <option value="usuario">Usuario Estándar</option>
                                            <option value="consulta">Solo Consulta</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="usuario-sistema" class="form-label">Usuario del Sistema</label>
                                        <input type="text" class="form-control" id="usuario-sistema">
                                        <div class="form-text">Dejar en blanco para generar automáticamente</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label">Permisos Específicos</label>
                                        <div class="border rounded p-3">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="permiso-ventas">
                                                <label class="form-check-label" for="permiso-ventas">
                                                    Módulo de Ventas
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="permiso-inventario">
                                                <label class="form-check-label" for="permiso-inventario">
                                                    Módulo de Inventario
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="permiso-finanzas">
                                                <label class="form-check-label" for="permiso-finanzas">
                                                    Módulo de Finanzas
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="permiso-reportes">
                                                <label class="form-check-label" for="permiso-reportes">
                                                    Generación de Reportes
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" class="btn btn-secondary me-3">Cancelar</button>
                                <button type="submit" class="btn btn-primary btn-submit">Guardar Empleado</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>