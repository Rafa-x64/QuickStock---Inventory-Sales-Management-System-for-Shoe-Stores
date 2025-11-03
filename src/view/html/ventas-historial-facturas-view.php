<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row">
                <div class="col-12 col-md-6 p-3 Quick-title text-center text-md-start">
                    <h1>Historial de Facturas</h1>
                </div>
                <div class="col-12 col-md-6 p-3 d-flex justify-content-center justify-content-md-end align-items-center">
                    <form action="" class="d-flex w-100 justify-content-center justify-content-md-end">
                        <input type="search" placeholder="Buscar Factura..." class="Quick-input me-2" id="facturas-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                <div class="col-12 Quick-table pt-4 mb-3">
                    <div class="table-responsive">
                        <table class="w-100 align-middle">
                            <thead>
                                <tr>
                                    <th class="ps-1">Nro. Factura</th>
                                    <th class="ps-1">Fecha</th>
                                    <th class="ps-1">Cliente</th>
                                    <th class="ps-1">Vendedor</th>
                                    <th class="ps-1">Total ($)</th>
                                    <th class="ps-1 text-center">Estado / Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>FAC-0001</td>
                                    <td>2025-10-22</td>
                                    <td>Ana Rodríguez</td>
                                    <td>Pedro Sola</td>
                                    <td>45.75</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Pagada</span>
                                        <div class="mt-2">
                                            <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                            <button class="btn btn-success btn-sm">Imprimir</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>FAC-0002</td>
                                    <td>2025-10-21</td>
                                    <td>Juan Pérez</td>
                                    <td>Ana López</td>
                                    <td>154.99</td>
                                    <td class="text-center">
                                        <span class="badge bg-danger">Anulada</span>
                                        <div class="mt-2">
                                            <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                            <button class="btn btn-success btn-sm">Imprimir</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>FAC-0003</td>
                                    <td>2025-10-21</td>
                                    <td>Empresa ABC</td>
                                    <td>Carlos Ruiz</td>
                                    <td>750.50</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Pagada</span>
                                        <div class="mt-2">
                                            <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                            <button class="btn btn-success btn-sm">Imprimir</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>FAC-0004</td>
                                    <td>2025-10-20</td>
                                    <td>María García</td>
                                    <td>Ana López</td>
                                    <td>29.95</td>
                                    <td class="text-center">
                                        <span class="badge bg-warning text-dark">Pendiente</span>
                                        <div class="mt-2">
                                            <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                            <button class="btn btn-success btn-sm">Imprimir</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>FAC-0005</td>
                                    <td>2025-10-19</td>
                                    <td>Cliente Genérico</td>
                                    <td>Roberto Mora</td>
                                    <td>105.00</td>
                                    <td class="text-center">
                                        <span class="badge bg-success">Pagada</span>
                                        <div class="mt-2">
                                            <button class="btn btn-warning btn-sm">Ver Detalle</button>
                                            <button class="btn btn-success btn-sm">Imprimir</button>
                                        </div>
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