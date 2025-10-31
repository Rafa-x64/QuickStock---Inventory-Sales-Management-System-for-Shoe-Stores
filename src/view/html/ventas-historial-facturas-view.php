<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row">
                <div class="col-6 p-5 Quick-title">
                    <h1>Historial de Facturas</h1>
                </div>
                <div class="col-6 p-5 d-flex flex-row justify-content-end align-items-center">
                    <form action="">
                        <input type="search" placeholder="Buscar Factura..." class="Quick-input" id="facturas-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                <div class="col-12 Quick-table pt-5 mb-3">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th class="ps-1">Nro. Factura</th>
                                <th class="ps-1">Fecha</th>
                                <th class="ps-1">Cliente</th>
                                <th class="ps-1">Empleado (Vendedor)</th>
                                <th class="ps-1">Total ($)</th>
                                <th class="ps-1 text-center">Estado / Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>F-001001</td>
                                <td>2025-10-22</td>
                                <td>Ana Rodríguez (C-108)</td>
                                <td>Pedro Sola (E-207)</td>
                                <td>45.75</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                    <button class="btn btn-success btn-sm">Imprimir</button>
                                </td>
                            </tr>
                            <tr>
                                <td>F-001002</td>
                                <td>2025-10-21</td>
                                <td>Juan Pérez (C-101)</td>
                                <td>Ana López (E-205)</td>
                                <td>154.99</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                    <button class="btn btn-success btn-sm">Imprimir</button>
                                </td>
                            </tr>
                            <tr>
                                <td>F-001003</td>
                                <td>2025-10-21</td>
                                <td>Empresa ABC (C-150)</td>
                                <td>Carlos Ruiz (E-201)</td>
                                <td>750.50</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                    <button class="btn btn-success btn-sm">Imprimir</button>
                                </td>
                            </tr>
                            <tr>
                                <td>F-001004</td>
                                <td>2025-10-20</td>
                                <td>María García (C-105)</td>
                                <td>Ana López (E-205)</td>
                                <td>29.95</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                    <button class="btn btn-success btn-sm">Imprimir</button>
                                </td>
                            </tr>
                            <tr>
                                <td>F-001005</td>
                                <td>2025-10-19</td>
                                <td>Cliente Genérico</td>
                                <td>Roberto Mora (E-203)</td>
                                <td>105.00</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                    <button class="btn btn-success btn-sm">Imprimir</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>