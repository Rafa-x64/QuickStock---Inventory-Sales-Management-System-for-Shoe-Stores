<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Reporte de Cierre de Caja</h4>
                </div>
                <div class="card-body">

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>**Detalles del Turno**</h5>
                            <p class="mb-1"><strong>Empleado:</strong> Juan Pérez (E-101)</p>
                            <p class="mb-1"><strong>Sucursal:</strong> Sucursal Principal (S-01)</p>
                            <p class="mb-1"><strong>Fecha y Hora Cierre:</strong> 2025-10-22 17:55:00</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5>**Ventas Resumidas**</h5>
                            <p class="mb-1"><strong>Ventas Totales Realizadas:</strong> 15</p>
                            <p class="mb-1"><strong>Monto de Apertura (Caja Base):</strong> $ 50.00 / Bs. 1850.00</p>
                        </div>
                    </div>

                    <hr>

                    <h5 class="mt-4">**Ingresos por Métodos de Pago**</h5>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped w-100 Quick-table">
                            <thead>
                                <tr>
                                    <th>Tipo de Pago</th>
                                    <th class="text-end">Monto en Bolívares (Bs.)</th>
                                    <th class="text-end">Monto en Dólares ($)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Efectivo</td>
                                    <td class="text-end">75,000.00</td>
                                    <td class="text-end">200.00</td>
                                </tr>
                                <tr>
                                    <td>Tarjeta de Crédito/Débito</td>
                                    <td class="text-end">185,000.00</td>
                                    <td class="text-end">500.00</td>
                                </tr>
                                <tr>
                                    <td>Transferencia Bancaria</td>
                                    <td class="text-end">37,000.00</td>
                                    <td class="text-end">100.00</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="fw-bold bg-light">
                                    <td>Total Recaudado por Ventas</td>
                                    <td class="text-end">297,000.00</td>
                                    <td class="text-end">800.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <hr>

                    <h5 class="mt-4">**Balance Final de Caja**</h5>
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    **Total Recaudado por Ventas:**
                                    <span>$ 800.00 / Bs. 297,000.00</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    **+ Monto de Apertura (Base):**
                                    <span>$ 50.00 / Bs. 1,850.00</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center fw-bold bg-success text-white">
                                    **= Total en Caja (Efectivo y Mixto):**
                                    <span>$ 850.00 / Bs. 298,850.00</span>
                                </li>
                            </ul>
                            <div class="alert alert-info mt-3">
                                **Nota:** Este total incluye las ventas en efectivo más el monto base de caja para el próximo turno. Los montos de tarjeta/transferencia se consolidan aparte.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>