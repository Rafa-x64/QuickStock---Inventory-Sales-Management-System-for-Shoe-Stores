<div class="container-fluid" id="mainContent"><!--para hacer la vista responsive y poder meterle el dashboard-->
    <div class="row"><!--importante poner-->
        <div class="col-12 p-5"><!--importante poner-->
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Lista de Compras</h1>
                </div>

                <div class="col-6 p-5 d-flex flex-row justify-content-end align-items-center">
                    <form action="">
                        <input type="search" placeholder="Buscar Compra por ID o Proveedor..." class="Quick-input" id="compras-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>

                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                    <div class="col-12 Quick-table pt-5 mb-3">
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <th>ID Compra</th>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    <th>Total (Calculado)</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1001</td>
                                    <td>2025-10-20</td>
                                    <td>Distribuidora Alpha (ID: 5)</td>
                                    <td>$ 450.00</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info text-white">Ver Detalle</a>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1002</td>
                                    <td>2025-10-21</td>
                                    <td>Suministros Beta (ID: 8)</td>
                                    <td>$ 1,200.50</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info text-white">Ver Detalle</a>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1003</td>
                                    <td>2025-10-21</td>
                                    <td>Fábrica Gamma (ID: 2)</td>
                                    <td>$ 85.75</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info text-white">Ver Detalle</a>
                                        <a href="#" class="btn btn-sm btn-warning">Editar</a>
                                        <a href="#" class="btn btn-sm btn-danger">Eliminar</a>
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