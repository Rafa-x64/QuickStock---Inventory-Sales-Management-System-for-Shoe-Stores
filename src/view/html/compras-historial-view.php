<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row">
                <div class="col-12 col-md-6 p-5 Quick-title">
                    <h1>Historial de Compras</h1>
                </div>
                <div class="col-12 col-md-6 p-5 d-flex flex-row justify-content-end align-items-center">
                    <form action="">
                        <input type="search" placeholder="Buscar Compra..." class="Quick-input" id="compras-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                <div class="col-12 Quick-table p-1 p-md-3">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th class="ps-1">Código</th>
                                <th class="ps-1">Fecha</th>
                                <th class="ps-1">Proveedor</th>
                                <th class="ps-1">Empleado</th>
                                <th class="ps-1">Sucursal</th>
                                <th class="ps-1">Total</th>
                                <th class="ps-1">Estado</th>
                                <th class="ps-1 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1001</td>
                                <td>2025-10-20</td>
                                <td>Distribuidora Alpha</td>
                                <td>María Gómez</td>
                                <td>QuickStock Central</td>
                                <td>$ 450.00</td>
                                <td><span class="badge bg-success">Completada</span></td>
                                <td class="text-center">
                                    <div class="container-fluid p-0">
                                        <div class="row g-1">
                                            <div class="col-6">
                                                <button class="btn btn-warning btn-sm w-100">Editar</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger btn-sm w-100">Eliminar</button>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-sm w-100">Ver Detalle</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1002</td>
                                <td>2025-10-22</td>
                                <td>Suministros Beta</td>
                                <td>Carlos Rivas</td>
                                <td>Sucursal Norte</td>
                                <td>$ 1,200.50</td>
                                <td><span class="badge bg-warning text-dark">Pendiente</span></td>
                                <td class="text-center">
                                    <div class="container-fluid p-0">
                                        <div class="row g-1">
                                            <div class="col-6">
                                                <button class="btn btn-warning btn-sm w-100">Editar</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger btn-sm w-100">Eliminar</button>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-sm w-100">Ver Detalle</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>1003</td>
                                <td>2025-10-24</td>
                                <td>Fábrica Gamma</td>
                                <td>Laura Méndez</td>
                                <td>Sucursal Este</td>
                                <td>$ 85.75</td>
                                <td><span class="badge bg-success">Completada</span></td>
                                <td class="text-center">
                                    <div class="container-fluid p-0">
                                        <div class="row g-1">
                                            <div class="col-6">
                                                <button class="btn btn-warning btn-sm w-100">Editar</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger btn-sm w-100">Eliminar</button>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-sm w-100">Ver Detalle</button>
                                            </div>
                                        </div>
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