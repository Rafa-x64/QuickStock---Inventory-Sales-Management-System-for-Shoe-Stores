<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">

            <!-- Encabezado -->
            <div class="row">
                <div class="col-12 col-md-6 p-5 Quick-title">
                    <h1>Lista de Métodos de Pago</h1>
                    <p class="text-secondary m-0">Consulta, edita o elimina los métodos de pago disponibles en el sistema</p>
                </div>
                <div class="col-12 col-md-6 p-5 d-flex flex-row justify-content-end align-items-center">
                    <form action="">
                        <input type="search" placeholder="Buscar Método de Pago..." class="Quick-input" id="metodo-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Tabla -->
            <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                <div class="col-12 Quick-table p-1 p-md-3">
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th class="ps-1">Código</th>
                                <th class="ps-1">Nombre del Método</th>
                                <th class="ps-1">¿Requiere Referencia?</th>
                                <th class="ps-1 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Efectivo</td>
                                <td>No</td>
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
                                <td>2</td>
                                <td>Transferencia Bancaria</td>
                                <td>Sí</td>
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
                                <td>3</td>
                                <td>Tarjeta de Débito/Crédito</td>
                                <td>Sí</td>
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