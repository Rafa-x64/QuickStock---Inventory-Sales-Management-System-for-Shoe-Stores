<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0">Cierre de Caja - Turno de Ventas</h4>
                </div>
                <div class="card-body">

                    <!-- 🧾 Información del Turno -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="Quick-title mb-2">Detalles del Turno</h5>
                            <p class="mb-1"><strong>Empleado:</strong> Juan Pérez (U-105)</p>
                            <p class="mb-1"><strong>Sucursal:</strong> Sucursal Norte (S-002)</p>
                            <p class="mb-1"><strong>Fecha Apertura:</strong> 2025-10-22 09:00:00</p>
                            <p class="mb-1"><strong>Fecha Cierre:</strong> 2025-10-22 17:55:00</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <h5 class="Quick-title mb-2">Resumen de Ventas</h5>
                            <p class="mb-1"><strong>Total de Ventas:</strong> 18</p>
                            <p class="mb-1"><strong>Facturas Anuladas:</strong> 1</p>
                            <p class="mb-1"><strong>Monto Apertura (Base):</strong> $50.00 / Bs. 1,850.00</p>
                            <p class="mb-1"><strong>Moneda Principal:</strong> Bolívar (Bs)</p>
                        </div>
                    </div>

                    <hr>

                    <!-- 💳 Ingresos por método de pago -->
                    <h5 class="mt-4 Quick-title">Ingresos por Métodos de Pago</h5>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Método de Pago</th>
                                    <th class="text-end">Monto (Bs.)</th>
                                    <th class="text-end">Monto ($)</th>
                                    <th class="text-center">Transacciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Efectivo</td>
                                    <td class="text-end">125,000.00</td>
                                    <td class="text-end">350.00</td>
                                    <td class="text-center">8</td>
                                </tr>
                                <tr>
                                    <td>Tarjeta de Crédito/Débito</td>
                                    <td class="text-end">210,000.00</td>
                                    <td class="text-end">600.00</td>
                                    <td class="text-center">7</td>
                                </tr>
                                <tr>
                                    <td>Transferencia Bancaria</td>
                                    <td class="text-end">42,000.00</td>
                                    <td class="text-end">120.00</td>
                                    <td class="text-center">3</td>
                                </tr>
                            </tbody>
                            <tfoot class="fw-bold bg-light">
                                <tr>
                                    <td>Total Recaudado</td>
                                    <td class="text-end">377,000.00</td>
                                    <td class="text-end">1,070.00</td>
                                    <td class="text-center">18</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <hr>

                    <!-- 💰 Balance Final -->
                    <h5 class="mt-4 Quick-title">Balance Final de Caja</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Total Recaudado (Ventas):
                            <span>$1,070.00 / Bs. 377,000.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            + Monto de Apertura:
                            <span>$50.00 / Bs. 1,850.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            - Devoluciones / Reintegros:
                            <span>$20.00 / Bs. 7,000.00</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center fw-bold text-white" style="background-color: var(--accent-color, #198754);">
                            Total Final en Caja:
                            <span>$1,100.00 / Bs. 371,850.00</span>
                        </li>
                    </ul>

                    <div class="alert alert-info mt-3">
                        <i class="bi bi-info-circle"></i> Este monto corresponde al efectivo disponible al cierre del turno. Los pagos con tarjeta y transferencias quedan registrados para conciliación bancaria.
                    </div>

                    <hr>

                    <!-- 📊 Resumen visual -->
                    <div class="row mt-4">
                        <div class="col-12 col-md-6 Quick-chart mb-3" style="height: 250px;">
                            <canvas id="chartCierreMetodos"></canvas>
                        </div>
                        <div class="col-12 col-md-6 Quick-chart mb-3" style="height: 250px;">
                            <canvas id="chartCierreVentasHora"></canvas>
                        </div>
                    </div>

                    <hr>

                    <!-- ✍️ Firma y Observaciones -->
                    <div class="row mt-4">
                        <div class="col-md-8">
                            <h6 class="Quick-title">Observaciones:</h6>
                            <textarea class="form-control" rows="3" placeholder="Escriba observaciones sobre diferencias de caja, devoluciones o incidencias..."></textarea>
                        </div>
                        <div class="col-md-4 d-flex flex-column justify-content-end align-items-center mt-3 mt-md-0">
                            <p class="mb-1 fw-bold">Firma del Cajero</p>
                            <div class="w-75 border-bottom border-2 border-dark mt-2"></div>
                            <p class="text-muted mt-1">Juan Pérez</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // =============================
    // 📊 GRÁFICAS DE CIERRE DE CAJA
    // =============================

    // Métodos de pago (pie)
    const ctxMetodos = document.getElementById('chartCierreMetodos');
    new Chart(ctxMetodos, {
        type: 'doughnut',
        data: {
            labels: ['Efectivo', 'Tarjeta', 'Transferencia'],
            datasets: [{
                data: [350, 600, 120],
                backgroundColor: [
                    'rgba(255, 205, 86, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(75, 192, 192, 0.8)'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Distribución por método de pago'
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });

    // Ventas por hora (line)
    const ctxHoras = document.getElementById('chartCierreVentasHora');
    new Chart(ctxHoras, {
        type: 'line',
        data: {
            labels: ['09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00'],
            datasets: [{
                label: 'Ventas por hora (Bs.)',
                data: [15000, 22000, 18000, 26000, 30000, 35000, 28000, 24000, 27000],
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Tendencia de ventas durante el turno'
                }
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });
</script>