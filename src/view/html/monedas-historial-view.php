<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Historial de Cambios en Tasas</h1>
                </div>

                <div class="col-6 p-5 d-flex flex-row justify-content-end align-items-center">
                    <form action="">
                        <input type="search" placeholder="Buscar por moneda o usuario" class="Quick-input" id="historial-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>

                <!-- Filtros -->
                <div class="row p-0 m-0 filters-section">
                    <div class="col-12">
                        <h4 class="mb-4">Filtros</h4>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="periodo-inicio" class="form-label">Fecha del Cambio</label>
                                <input type="date" class="form-control" id="periodo-inicio" name="periodo-inicio">
                            </div>
                            <div class="row p-0 m-0 mb-4">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <h4>Opciones de Exportación</h4>
                                    <div class="export-buttons">
                                        <button class="btn btn-danger">
                                            <i class="bi bi-file-pdf me-2"></i>Exportar a PDF
                                        </button>
                                        <button class="btn btn-success">
                                            <i class="bi bi-file-earmark-spreadsheet me-2"></i>Exportar a Excel
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="tipo-moneda-historial" class="form-label">Tipo de moneda</label>
                                    <select class="form-select" id="tipo-moneda-historial" name="tipo-moneda-historial">
                                        <option value="">Todas las monedas</option>
                                        <option value="USD">USD - Dólar Estadounidense</option>
                                        <option value="EUR">EUR - Euro</option>
                                    </select>
                                </div>
                                <div class="col-md-8 mb-3 d-flex align-items-end">
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
                                        <th>Fecha Cambio</th>
                                        <th>Moneda</th>
                                        <th>Tasa Anterior</th>
                                        <th>Tasa Nueva</th>
                                        <th>Variación</th>
                                        <th>Usuario</th>
                                        <th>Motivo</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>04/11/2025 8:30</td>
                                        <td>USD - Dólar Estadounidense</td>
                                        <td>226.50</td>
                                        <td>227.12</td>
                                        <td class="change-positive">+0.27%</td>
                                        <td>EMP-1003 (Luis Suarez)</td>
                                        <td>Actualización del BCV</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">Detalles</a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">Revertir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>03/11/2025 10:15</td>
                                        <td>EUR - Euro</td>
                                        <td>265.80</td>
                                        <td>259.63</td>
                                        <td class="change-negative">-2.32%</td>
                                        <td>EMP-1001 (Ana Rodríguez)</td>
                                        <td>Corrección por error</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">Detalles</a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">Revertir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>02/11/2025 15:45</td>
                                        <td>EUR - Euro</td>
                                        <td>259.40</td>
                                        <td>262.25</td>
                                        <td class="change-positive">+1.09%</td>
                                        <td>EMP-1002 (Carlos Pérez)</td>
                                        <td>Actualización semanal</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">Detalles</a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">Revertir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>01/11/2025 09:20</td>
                                        <td>USD - Dólar Estadounidense</td>
                                        <td>224.52</td>
                                        <td>221.49</td>
                                        <td class="change-negative">-1.34%</td>
                                        <td>EMP-1003 (Luis Suarez)</td>
                                        <td>Actualización Diaria del BCV</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">Detalles</a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">Revertir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>30/10/2025 11:30</td>
                                        <td>USD - Dólar Estadounidense</td>
                                        <td>225.75</td>
                                        <td>226.50</td>
                                        <td class="change-positive">+0.33%</td>
                                        <td>EMP-1001 (Ana Rodríguez)</td>
                                        <td>Actualización diaria</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">Detalles</a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">Revertir</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>29/10/2025 15:10</td>
                                        <td>EUR - Euro</td>
                                        <td>257.20</td>
                                        <td>258.80</td>
                                        <td class="change-positive">+0.62%</td>
                                        <td>EMP-1002 (Carlos Pérez)</td>
                                        <td>Corrección de tasa anterior</td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info text-white btn-action">Detalles</a>
                                            <a href="#" class="btn btn-sm btn-warning btn-action">Revertir</a>
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