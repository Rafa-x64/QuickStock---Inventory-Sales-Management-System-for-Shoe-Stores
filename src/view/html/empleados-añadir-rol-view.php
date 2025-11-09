<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <h3 class="Quick-title">Añadir Rol</h3>
                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center">
                    <div class="col-12 form-container">
                        <form action="#">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="nombre-rol" class="form-label">Nombre del Rol</label>
                                    <input type="text" class="form-control" id="nombre-rol" placeholder="Ej: Supervisor de Ventas" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="descripcion-rol" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion-rol" placeholder="Breve descripción del rol">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="duplicar-rol" class="form-label">Duplicar Rol Existente (Opcional)</label>
                                    <select class="form-select" id="duplicar-rol">
                                        <option value="">Seleccionar rol a duplicar</option>
                                        <option value="supervisor-ventas">Supervisor de Ventas</option>
                                        <option value="analista-financiero">Analista Financiero</option>
                                        <option value="coordinador-operaciones">Coordinador de Operaciones</option>
                                    </select>
                                </div>
                            </div>

                            <!--<div class="permissions-section">
                            <h4 class="mb-4">Editor de Permisos</h4>

                            <div class="module-card">
                                <div class="module-header" data-bs-toggle="collapse" data-bs-target="#modulo-ventas">
                                    <i class="bi bi-graph-up me-2"></i>Módulo de Ventas
                                </div>
                                <div class="collapse show" id="modulo-ventas">
                                    <div class="module-content">
                                        <div class="permission-levels">
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ventas-permiso" id="ventas-lectura" value="lectura">
                                                    <label class="form-check-label" for="ventas-lectura">
                                                        <strong>Lectura</strong><br>
                                                        <small class="text-muted">Solo consulta</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ventas-permiso" id="ventas-escritura" value="escritura" checked>
                                                    <label class="form-check-label" for="ventas-escritura">
                                                        <strong>Escritura</strong><br>
                                                        <small class="text-muted">Consulta y edición</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="ventas-permiso" id="ventas-eliminacion" value="eliminacion">
                                                    <label class="form-check-label" for="ventas-eliminacion">
                                                        <strong>Eliminación</strong><br>
                                                        <small class="text-muted">Acceso completo</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <!-- Módulo de Inventario -->
                            <!--<div class="module-card">
                                <div class="module-header" data-bs-toggle="collapse" data-bs-target="#modulo-inventario">
                                    <i class="bi bi-box-seam me-2"></i>Módulo de Inventario
                                </div>
                                <div class="collapse" id="modulo-inventario">
                                    <div class="module-content">
                                        <div class="permission-levels">
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="inventario-permiso" id="inventario-lectura" value="lectura" checked>
                                                    <label class="form-check-label" for="inventario-lectura">
                                                        <strong>Lectura</strong><br>
                                                        <small class="text-muted">Solo consulta</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="inventario-permiso" id="inventario-escritura" value="escritura">
                                                    <label class="form-check-label" for="inventario-escritura">
                                                        <strong>Escritura</strong><br>
                                                        <small class="text-muted">Consulta y edición</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="inventario-permiso" id="inventario-eliminacion" value="eliminacion">
                                                    <label class="form-check-label" for="inventario-eliminacion">
                                                        <strong>Eliminación</strong><br>
                                                        <small class="text-muted">Acceso completo</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <!-- Módulo de Finanzas -->
                            <!--<div class="module-card">
                                <div class="module-header" data-bs-toggle="collapse" data-bs-target="#modulo-finanzas">
                                    <i class="bi bi-cash-coin me-2"></i>Módulo de Finanzas
                                </div>
                                <div class="collapse" id="modulo-finanzas">
                                    <div class="module-content">
                                        <div class="permission-levels">
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="finanzas-permiso" id="finanzas-lectura" value="lectura">
                                                    <label class="form-check-label" for="finanzas-lectura">
                                                        <strong>Lectura</strong><br>
                                                        <small class="text-muted">Solo consulta</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="finanzas-permiso" id="finanzas-escritura" value="escritura">
                                                    <label class="form-check-label" for="finanzas-escritura">
                                                        <strong>Escritura</strong><br>
                                                        <small class="text-muted">Consulta y edición</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="finanzas-permiso" id="finanzas-eliminacion" value="eliminacion">
                                                    <label class="form-check-label" for="finanzas-eliminacion">
                                                        <strong>Eliminación</strong><br>
                                                        <small class="text-muted">Acceso completo</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <!-- Módulo de Reportes -->
                            <!--<div class="module-card">
                                <div class="module-header" data-bs-toggle="collapse" data-bs-target="#modulo-reportes">
                                    <i class="bi bi-bar-chart me-2"></i>Módulo de Reportes
                                </div>
                                <div class="collapse" id="modulo-reportes">
                                    <div class="module-content">
                                        <div class="permission-levels">
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="reportes-permiso" id="reportes-lectura" value="lectura">
                                                    <label class="form-check-label" for="reportes-lectura">
                                                        <strong>Lectura</strong><br>
                                                        <small class="text-muted">Solo consulta</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="reportes-permiso" id="reportes-escritura" value="escritura" checked>
                                                    <label class="form-check-label" for="reportes-escritura">
                                                        <strong>Escritura</strong><br>
                                                        <small class="text-muted">Consulta y generación</small>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="permission-option">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="reportes-permiso" id="reportes-eliminacion" value="eliminacion">
                                                    <label class="form-check-label" for="reportes-eliminacion">
                                                        <strong>Eliminación</strong><br>
                                                        <small class="text-muted">Acceso completo</small>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->

                            <!--<div class="row mt-4">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-muted">Permisos seleccionados: </span>
                                        <span class="badge bg-primary access-badge">Ventas: Escritura</span>
                                        <span class="badge bg-info access-badge">Inventario: Lectura</span>
                                        <span class="badge bg-primary access-badge">Reportes: Escritura</span>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-secondary me-3">Cancelar</button>
                                        <button type="submit" class="btn btn-primary btn-submit">Guardar Rol</button>
                                    </div>
                                </div>
                            </div>-->

                            <div class="row mt-4">
                                <div>
                                    <button type="button" class="btn btn-secondary me-3">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-submit">Guardar Rol</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>